<?php
require_once("author-functions.php");

if (isset($_POST["deleteButton"]) && isset($_POST["author-to-delete"])) {
    $authorToDelete = $_POST["author-to-delete"];
    echo $authorToDelete;

    deleteAuthor($authorToDelete);
}

header("Location: /author-list.php");