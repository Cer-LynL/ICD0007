<?php

require_once("book-functions.php");


$title = $_POST["title"];
$grade = $_POST["grade"];
$isRead = $_POST["isRead"];
$author_id = $_POST["author_id"];

saveBook($title, $grade, $isRead, $author_id);

header("Location: /");