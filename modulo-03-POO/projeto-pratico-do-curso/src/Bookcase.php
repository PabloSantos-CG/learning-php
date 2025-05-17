<?php

namespace Pablo\Biblioteca;


class Bookcase
{
    /**
     * @var array<string, Book[]>
     */
    private array $collection = [];

    public function getAllCategories(): array
    {
        return array_keys($this->collection);
    }

    public function getAllBooks(): array
    {
        $allValuesInArray = array_values($this->collection);
        $allBooks = array_merge(...$allValuesInArray);

        return $allBooks;
    }

    private function categoryExists(string $categoryName): bool
    {
        return key_exists($categoryName, $this->collection);
    }

    public function getBooksByCategory(string $categoryName): array
    {
        return $this->categoryExists($categoryName) ? $this->collection[$categoryName] : [];
    }

    public function getBook(string $bookTitle, string $categoryName): ?Book
    {
        if (!$this->categoryExists($categoryName)) {
            return null;
        }

        $bookFound = array_filter(
            $this->collection,
            fn(Book $book) => $book->getTitle() === $bookTitle
        );

        // retorna primeiro elemento da lista ou null
        return reset($bookFound) ?: null;
    }

    private function canCreateBook(string $title, string $categoryName): bool
    {
        if (!$this->categoryExists($categoryName)) {
            return false;
        }

        $bookExists = $this->getBook($title, $categoryName);

        if ($bookExists) {
            return false;
        }

        return true;
    }

    public function createBook(Book $book, string $categoryName): bool
    {
        if (!$this->canCreateBook($book->getTitle(), $categoryName)) {
            return false;
        }

        array_push($this->collection[$categoryName], $book);

        return true;
    }

    private function canRemoveBook(string $bookTitle, string $categoryName): bool
    {
        if (!$this->categoryExists($categoryName)) {
            return false;
        }

        $book = $this->getBook($bookTitle, $categoryName);

        if ($book === null) {
            return false;
        }

        if (!$book->getAvailableStatus()) {
            return false;
        }
        return true;
    }

    public function removeBook(string $bookTitle, string $categoryName): bool
    {
        if (!$this->canRemoveBook($bookTitle, $categoryName)) {
            return false;
        }

        foreach ($this->collection[$categoryName] as $index => $book) {
            if ($book->getTitle() === $bookTitle) {
                /** PROBLEMA 
                 * Gera problemas com indexação da sublista tornando-a uma lista associativa
                 */
                unset($this->collection[$categoryName][$index]);

                /** SOLUÇÃO 
                 * Reindexando a lista de livros de uma categoria específica
                 */
                $this->collection[$categoryName] = array_values($this->collection[$categoryName]);

                break;
            }
        }

        return true;
    }

    private function canRemoveCategory(string $categoryName): bool
    {
        if (!$this->categoryExists($categoryName)) {
            return false;
        }

        // não pode apagar se houver dados (obj livro) na sublista
        if (!empty($this->getBooksByCategory($categoryName))) {
            return false;
        }

        return true;
    }

    public function removeCategory(string $categoryName): bool
    {
        if (!$this->canRemoveCategory($categoryName)) {
            return false;
        }

        unset($this->collection[$categoryName]);

        return true;
    }
}
