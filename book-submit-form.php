<?php

require_once("book-functions.php");

$title = $_POST["title"];
$grade = $_POST["grade"];
$isRead = $_POST["isRead"];

saveBook($title, $grade, $isRead);

header("Location: /");