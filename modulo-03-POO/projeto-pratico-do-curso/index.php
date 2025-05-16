<?php

require 'vendor/autoload.php';

use Pablo\Biblioteca\Book;

$book = new Book('Clean Code', 'Ancle Bob');

echo '<pre >';
echo $book->getDetailsBook();
echo '<pre />';
