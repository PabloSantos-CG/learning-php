<?php

namespace Pablo\Biblioteca;


class Bookcase
{
    /**
     * @var array<string, Book[]>
     */
    private array $bookCollection = [];

    public function getAllCategories(): array
    {
        return array_keys($this->bookCollection);
    }

    public function getAllBooks(): array
    {
        $allValuesInArray = array_values($this->bookCollection);
        $allBooks = array_merge(...$allValuesInArray);

        return $allBooks;
    }

    private function categoryExists(string $categoryName): bool
    {
        return key_exists($categoryName, $this->bookCollection);
    }

    public function getBooksByCategory(string $categoryName): array
    {
        return $this->categoryExists($categoryName) ? $this->bookCollection[$categoryName] : [];
    }

    public function getBook(string $bookTitle, string $categoryName): ?Book
    {
        if (!$this->categoryExists($categoryName)) {
            return null;
        }

        $bookFound = array_filter(
            $this->bookCollection[$categoryName],
            fn(Book $book) => $book->getTitle() === $bookTitle
        );

        // retorna primeiro elemento da lista ou null
        return reset($bookFound) ?: null;
    }

    public function getBooksByTitle(string $title)
    {
        if (empty($this->bookCollection) || empty($title)) {
            return null;
        }

        $books = [];

        foreach ($this->bookCollection as $key => $bookList) {
            $foundBooks = array_filter(
                $bookList,
                fn($currentBook) => str_contains($currentBook->getTitle(), $title)
            );

            array_push($books, $foundBooks);
        }

        return array_merge(...$books);
    }

    private function canAddBook(string $title, string $categoryName): bool
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

    public function addBook(Book $book, string $categoryName): bool
    {
        if (!$this->canAddBook($book->getTitle(), $categoryName)) {
            return false;
        }

        array_push($this->bookCollection[$categoryName], $book);

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

        foreach ($this->bookCollection[$categoryName] as $index => $book) {
            if ($book->getTitle() === $bookTitle) {
                /** PROBLEMA 
                 * Gera problemas com indexação da sublista tornando-a uma lista associativa
                 */
                unset($this->bookCollection[$categoryName][$index]);

                /** SOLUÇÃO 
                 * Reindexando a lista de livros de uma categoria específica
                 */
                $this->bookCollection[$categoryName] = array_values($this->bookCollection[$categoryName]);

                break;
            }
        }

        return true;
    }

    public function addCategory(string $categoryName): bool
    {
        if ($this->categoryExists($categoryName)) {
            return false;
        }

        $this->bookCollection[$categoryName] = [];
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

        unset($this->bookCollection[$categoryName]);

        return true;
    }

    public function toggleStatusBook(Book $book, string $categoryName, bool $available): bool
    {
        /**
         * @var Book $loopBook
         */
        foreach ($this->bookCollection[$categoryName] as $loopBook) {
            if ($loopBook->getTitle() === $book->getTitle()) {
                $available ? $loopBook->markAsAvailable() : $loopBook->markAsBorrowed();

                return true;
            }
        }

        return true;
    }
}
