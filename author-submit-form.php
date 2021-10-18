<?php
require_once("author-functions.php");

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$grade = $_POST["grade"];

saveAuthor($firstName, $lastName, $grade);

header("Location: /author-list.php");