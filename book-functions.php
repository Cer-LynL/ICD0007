<?php

const DATA_FILE = __DIR__ . '/books.txt';

function saveBook($title, $grade, $isRead) {

    $line = urlencode($title)
        . ', ' . urlencode($grade)
        . ', ' . urlencode($isRead) . PHP_EOL;

    file_put_contents(DATA_FILE, $line, FILE_APPEND);
}

function getAllBooks(): array
{

    $lines = file(DATA_FILE);

    $books = [];

    foreach ($lines as $line) {
        list($title, $grade, $isRead) = explode(",", $line);
        $books[] = ["title" => urldecode($title), "grade" => urldecode($grade), "isRead" => urldecode($isRead)];
    }

    return $books;
}

function deleteBook($title) {
    $books = getAllBooks();
    $data = "";

    foreach ($books as $book) {
        if ($book["title"] !== $title) {
            $data = $data . urlencode($book["title"])
                . "," . urlencode($book["grade"])
                . "," . urlencode($book["isRead"]) . PHP_EOL;
        }
    }

    file_put_contents(DATA_FILE, $data);
}

function editBook($originalTitle, $title, $grade, $isRead) {
    $books = getAllBooks();
    $data = "";

    foreach ($books as $book) {
        if ($book["title"] === $originalTitle) {
            $book["title"] = $title;
            $book["grade"] = $grade;
            $book["isRead"] = $isRead;
        }

        $data = $data . urlencode($book["title"])
            . "," . urlencode($book["grade"])
            . "," . urlencode($book["isRead"]) . PHP_EOL;
    }

    file_put_contents(DATA_FILE, $data);
}

function getBookByTitle($title) {
    $books = getAllBooks();

    foreach ($books as $book) {
        if ($book["title"] === $title) {
            return $book;
        }
    }

    return null;
}
