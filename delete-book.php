<?php
require_once("book-functions.php");

if (isset($_POST["deleteButton"]) && isset($_POST["book-to-delete"])) {
    $bookToDelete = $_POST["book-to-delete"];
    echo $bookToDelete;

    deleteBook($bookToDelete);
}

header("Location: /");