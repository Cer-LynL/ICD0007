<?php

const DATA_FILE = __DIR__ . '/authors.txt';

function saveAuthor($firstName, $lastName, $grade) {

    $line = urlencode($firstName)
        . ', ' . urlencode($lastName)
        . ', ' . urlencode($grade) . PHP_EOL;

    file_put_contents(DATA_FILE, $line, FILE_APPEND);
}

function getAllAuthors() : array{

    $lines = file(DATA_FILE);

    $names = [];

    foreach ($lines as $line) {
        list($firstName, $lastName, $grade) = explode(', ', $line);

        $names[] = ["firstName" => urldecode($firstName), "lastName" => urldecode($lastName), "grade" => urldecode($grade)];
    }

    return $names;
}

function deleteAuthor($firstName, $lastName) {
    $authors = getAllAuthors();
    $data = "";

    foreach ($authors as $author) {
        if (($author["firstName"] !== $firstName) && ($author["lastName"] !== $lastName)) {
            $data = $data . urlencode($author["firstName"])
                . ", " . urlencode($author["lastName"])
                . ", " . urlencode($author["grade"]) . PHP_EOL;
        }
    }

    file_put_contents(DATA_FILE, $data);
}

function editAuthor($originalFirst, $originalLast, $firstName, $lastName, $grade) {
    $authors = getAllAuthors();
    $data = "";

    foreach ($authors as $author) {
        if (($author["firstName"] === $originalFirst) && ($author["lastName"] === $originalLast)){
            $author["firstName"] = $firstName;
            $author["lastName"] = $lastName;
            $author["grade"] = $grade;
        }

        $data = $data . urlencode($author["firstName"])
            . ", " . urlencode($author["lastName"])
            . ", " . urlencode($author["grade"]) . PHP_EOL;
    }

    file_put_contents(DATA_FILE, $data);
}

function getBookByAuthor($firstName) {
    $authors = getAllAuthors();

    foreach ($authors as $author) {
        if ($author["firstName"] === $firstName) {
            return $author;
        }
    }

    return null;
}
