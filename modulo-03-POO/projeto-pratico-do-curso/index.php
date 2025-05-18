<?php

require 'vendor/autoload.php';

use Pablo\Biblioteca\Book;
use Pablo\Biblioteca\Bookcase;
use Pablo\Biblioteca\Librarian;
use Pablo\Biblioteca\LibrarianService;
use Pablo\Biblioteca\Student;
use Pablo\Biblioteca\Teacher;


$book1 = new Book('PHP para iniciantes', 'Fulano');
$book2 = new Book('Java para iniciantes', 'Cicrano');
$book3 = new Book('Python para iniciantes', 'Beltrano');

$bookcase = new Bookcase();

$bookcase->addCategory('programacao');

$bookcase->addBook($book1, 'programacao');
$bookcase->addBook($book2, 'programacao');
$bookcase->addBook($book3, 'programacao');

$student = new Student('João', 1);
$teacher = new Teacher('Maria', 3);

try {
    Librarian::lendBook($student, $book1, $bookcase, 'programacao');

    echo '<pre >';
    print_r($student);
    echo '<pre />'. '<hr />';

    // Librarian::returnBook($student, $book1, $bookcase, 'programacao');
    echo '<pre >';
    print_r($bookcase);
    echo '<pre />'. '<hr />';
} catch (Exception $err) {
    echo $err->getMessage();
}
