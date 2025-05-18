<?php

namespace Pablo\Biblioteca;


abstract class User
{
    protected string $name;
    protected int $allowedQuantity;
    /**
     * @var Book[]
     */
    protected array $borrowedBooks;

    /**
     * @return Book[]
     */
    abstract public function getBorrowedBooks(): array;

    abstract public function addBorrowedBook(Book $book): bool;

    abstract public function removeBorrowedBook(Book $book): bool;
}
