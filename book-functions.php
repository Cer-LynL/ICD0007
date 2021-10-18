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
