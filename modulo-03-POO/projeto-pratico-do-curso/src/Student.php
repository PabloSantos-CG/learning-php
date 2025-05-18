<?php

namespace Pablo\Biblioteca;


class Student extends User
{

    public function getBorrowedBooks(): array
    {
        return $this->borrowedBooks;
    }

    private function canBorrow(): bool
    {
        return $this->allowedQuantity === 0;
    }

    public function addBorrowedBook(Book $book): bool
    {
        if (!$this->canBorrow()) {
            return false;
        }

        array_push($this->borrowedBooks);
        $this->allowedQuantity++;

        return true;
    }

    private function canRemoveBorrowedBook(Book $book): bool
    {
        if (!in_array($book, $this->borrowedBooks)) {
            return false;
        }
        return true;
    }

    public function removeBorrowedBook(Book $book): bool
    {
        if (!$this->canRemoveBorrowedBook($book)) {
            return false;
        }

        $this->borrowedBooks = array_filter(
            $this->borrowedBooks,
            fn($currentBook) => $currentBook->getTitle() === $book->getTitle()
        );

        return true;
    }
}
