<?php

namespace Pablo\Biblioteca;


abstract class User
{

    /**
     * @var Book[]
     */
    protected array $borrowedBooks;

    public function __construct(
        protected readonly string $name,
        protected readonly int $allowedQuantityBook,
    ) {
        $this->borrowedBooks = [];
    }

    abstract public function getName(): string;

    /**
     * @return Book[]
     */
    abstract public function getBorrowedBooks(): array;

    abstract public function addBorrowedBook(Book $book): bool;

    abstract public function removeBorrowedBook(Book $book): bool;
}
