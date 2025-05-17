<?php

namespace Pablo\Biblioteca;


class Bookcase
{
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

    public function createBook(string $title, string $author, string $category): bool
    {
        if (!$this->canCreateBook($title, $category)) {
            return false;
        }

        $book = new Book($title, $author);

        array_push($this->collection[$category], $book);

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

        foreach ($this->collection[$categoryName] as $index => $objectBook) {
            if ($objectBook->title === $bookTitle) {
                unset($this->collection[$categoryName][$index]);

                // reindexando a lista de livros de uma categoria específica
                $this->collection[$categoryName] = array_values($this->collection[$categoryName]);

                break;
            }
        }

        return true;
    }

    // implementar método removeCategory() e canRemoveCategory()
    
}
