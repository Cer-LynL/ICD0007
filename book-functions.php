<?php

require_once __DIR__ . '/ex5/connection.php';

function saveBook($title, $grade, $isRead, $author_id) {

    $conn = getConnection();

    if (empty($grade) || !is_numeric($grade)) {

        $grade = null;

    }
    if (empty($isRead)) {

        $isRead = null;

    }

    $sql = $conn->prepare('INSERT INTO books(title, grade, isRead, author_id)
        VALUES(:title, :grade, :isRead, :author_id)');

    $sql->bindValue(":title", urldecode($title));
    $sql->bindValue(":grade", $grade);
    $sql->bindValue(":isRead", $isRead);
    $sql->bindValue(":author_id", $author_id);
    $sql->execute();

}

function getAllBooks(): array {

    $conn = getConnection();

    $lines = $conn->prepare('SELECT book_id, title, b.grade, isRead, b.author_id
                                 from cer_lynl.books b
                                 left join authors a on b.author_id = a.author_id');

    $lines->execute();

    $books = [];

    foreach ($lines as $row) {
        $books[] = [$row['book_id'],
            urldecode($row['title']),
            $row['grade'],
            $row['isRead'],
            $row['author_id']];
    }
    return $books;
}

function getAuthor($id): array {

    $conn = getConnection();

    $lines = $conn->prepare("SELECT authors.firstName, authors.lastName FROM authors, books 
WHERE books.author_id = authors.author_id AND book_id = :id");

    $lines->bindValue(":id", $id);
    $lines->execute();

    $authorNames = [];

    foreach ($lines as $row) {
        $authorNames[] = [urldecode($row['firstName']), urldecode($row['lastName'])];
    }
    return $authorNames;
}

function getAuthorAsString($id): string {

    $conn = getConnection();

    $lines = $conn->prepare("SELECT author_id, firstName, lastName FROM authors");

    $lines->execute();

    $authorNames = "";

    foreach ($lines as $row) {
        if ($row['author_id'] == $id) {
            $authorFirst = urldecode($row['firstName']);
            $authorLast = urldecode($row['lastName']);
            $authorNames = $authorNames.$authorFirst." ".$authorLast;

        }

    }
    return $authorNames;

}

function deleteBook($id) {

    $conn = getConnection();

    $stmt = $conn->prepare(
        'DELETE FROM books WHERE book_id = :id');

    $stmt->bindValue(':id', $id);

    $stmt->execute();
}

function getBookByID($book_id) {
    $books = getAllBooks();

    foreach ($books as $book) {
        if ($book[0] == $book_id) {

            return $book;
        }
    }

    return null;

}
