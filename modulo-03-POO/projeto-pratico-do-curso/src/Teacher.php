<?php

namespace Pablo\Biblioteca;


class Teacher extends User
{

    public function getName(): string
    {
        return $this->name;
    }

    public function getBorrowedBooks(): array
    {
        return $this->borrowedBooks;
    }

    private function canAddBorrowedBook(): bool
    {
        return count($this->borrowedBooks) < $this->allowedQuantityBook;
    }

    public function addBorrowedBook(Book $book): bool
    {
        if (!$this->canAddBorrowedBook()) {
            return false;
        }

        array_push($this->borrowedBooks, $book);

        return true;
    }

    private function canRemoveBorrowedBook(): bool
    {
        return count($this->borrowedBooks) > 0;
    }

    public function removeBorrowedBook(Book $book): bool
    {
        if (!$this->canRemoveBorrowedBook()) {
            return false;
        }

        $this->borrowedBooks = array_filter(
            $this->borrowedBooks,
            fn($currentBook) => $currentBook->getTitle() === $book->getTitle()
        );

        return true;
    }
}
