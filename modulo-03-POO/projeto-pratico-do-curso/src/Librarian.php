<?php

namespace Pablo\Biblioteca;

use Exception;


class Librarian
{
    public static function lendBook(User $user, Book $book, Bookcase $bookcase, string $category): bool
    {
        $bookFound = $bookcase->getBook($book->getTitle(), $category);

        if (!$bookFound) {
            throw new Exception('Livro não encontrado.');
        }

        if (!$bookFound->getAvailableStatus()) {
            throw new Exception('Livro não está disponível.');
        }

        $user->addBorrowedBook($book);

        if (!$bookcase->toggleStatusBook($book, $category, false)) {
            throw new Exception('Ops. Houve algum erro, verifique se está colocando as informações corretas e tente novamente');
        }

        return true;
    }

    public static function returnBook(User $user, Book $book, Bookcase $bookcase, string $category): bool
    {
        $bookFound = $bookcase->getBook($book->getTitle(), $category);

        if ($bookFound->getAvailableStatus()) {
            throw new Exception('Livro ainda não foi emprestado.');
        }

        $userBooks = $user->getBorrowedBooks();

        if (!in_array($book, $userBooks)) {
            throw new Exception('O livro ' . $book->getTitle() . ' não está contigo.');
        }

        $user->removeBorrowedBook($book);

        if (!$bookcase->toggleStatusBook($book, $category, true)) {
            throw new Exception('Ops. Houve algum erro, verifique se está colocando as informações corretas e tente novamente');
        }

        return true;
    }
}
