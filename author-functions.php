<?php

require_once __DIR__ . '/ex5/connection.php';
// require_once __DIR__ . '/Author.php';

function saveAuthor($firstName, $lastName, $grade) {

    $conn = getConnection();

    if (empty($grade) || !is_numeric($grade)) {

        $grade = null;

    }
    $sql = $conn->prepare('INSERT INTO authors(firstName, lastName, grade)
    VALUES(:firstName, :lastName, :grade)');

    $sql->bindValue(":firstName", urldecode($firstName));
    $sql->bindValue(":lastName", urldecode($lastName));
    $sql->bindValue(":grade", $grade);

    $sql->execute();

}

function getAllAuthors() : array{

    $conn = getConnection();

    $lines = $conn->prepare('SELECT author_id, firstName, lastName, grade
                                 from cer_lynl.authors 
                                 order by author_id');

    $lines->execute();

    $authors = [];

    foreach ($lines as $row) {
        $authors[] = [$row['author_id'],
            urldecode($row['firstName']),
            urldecode($row['lastName']),
            $row['grade']];
    }

    return $authors;
}

function deleteAuthor($id) {

    $conn = getConnection();

    $stmt = $conn->prepare(
        'DELETE FROM authors WHERE author_id = :id');

    $stmt->bindValue(':id', $id);

    $stmt->execute();

}

function getBookByAuthor($author_id) {
    $authors = getAllAuthors();

    foreach ($authors as $author) {
        if ($author[0] === $author_id) {
            return $author;
        }
    }

    return null;
}
