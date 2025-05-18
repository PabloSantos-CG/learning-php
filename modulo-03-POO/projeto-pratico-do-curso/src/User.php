<?php

namespace Pablo\Biblioteca;


abstract class User
{

    /**
     * @var Book[]
     */
    protected array $borrowedBooks;

    public function __construct(
        protected string $name,
        protected int $allowedQuantityBook,
    ) {}

    abstract public function getName(): string;

    /**
     * @return Book[]
     */
    abstract public function getBorrowedBooks(): array;

    abstract public function addBorrowedBook(Book $book): bool;

    abstract public function removeBorrowedBook(Book $book): bool;
}
