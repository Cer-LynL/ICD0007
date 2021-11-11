<?php

session_start();

require_once("book-functions.php");

$books = getAllBooks();

$errors = [];
$title = "";
$grade = "";
$isRead = "";

$book = null;

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["title"])) {
        $book = getBookByTitle($_GET["title"]);

        $title = $book["title"];
        $grade = $book["grade"];
        $isRead = $book["isRead"];
    }

} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    $originalTitle = $_POST["originalTitle"];
    editBook($originalTitle, $title, $grade, $isRead);
    header("Location: /");

    if (isset($_POST["deleteButton"])) {
        $bookToDelete = $_POST["book-to-delete"];
        echo $bookToDelete;

        deleteBook($bookToDelete);

        header("Location: /");
    } else {
        $title = $_POST["title"] ?? "";
        $grade = $_POST["grade"] ?? "";
        $isRead = $_POST["isRead"] ?? "";

        if (strlen($title) < 3 || strlen($title) > 28) {
            $errors[] = "Pealkiri peab olema 3 kuni 28 tähemärki!";
        }
        if (empty($errors)) {
            saveBook($title, $grade, $isRead);
            $_SESSION["message"] = "Lisatud!";
            header("Location: /");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body id="book-form-page">
<div id="root">
    <nav>
        <div>
            <a href="index.php" id="book-list-link">Raamatud</a>
            <span>|</span>
            <a href="book-add.php" id="book-form-link">Lisa raamat</a>
            <span>|</span>
            <a href="author-list.php" id="author-list-link">Autorid</a>
            <span>|</span>
            <a href="author-add.php" id="author-form-link">Lisa autor</a>
        </div>
    </nav>
    <main>

        <?php if (!(empty($errors))): ?>
        <div id="error-block" class="alert">
            <?php foreach ($errors as $error): ?>
                <?= $error ?><br
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <form id="input-form" action="edit-book.php" method="post">
            <div class="label-cell">
                <label for="title">Pealkiri: </label>
            </div>
            <div class="input-cell">
                <input id="title" name="title" type='text' value="<?= $book["title"] ?>">
                <input type="hidden" name="originalTitle" value="<?= $book["title"] ?>"/>
            </div>
            <div class="break"></div>
            <div class="label-cell">Hinne: </div>
            <div class="input-cell">
                <label>
                    <input type="radio" name="grade" value="1" <?php if ($grade == 1) echo 'checked' ?>> 1
                </label>
                <label>
                    <input type="radio" name="grade" value="2" <?php if ($grade == 2) echo 'checked' ?>> 2
                </label>
                <label>
                    <input type="radio" name="grade" value="3" <?php if ($grade == 3) echo 'checked' ?>> 3
                </label>
                <label>
                    <input type="radio" name="grade" value="4" <?php if ($grade == 4) echo 'checked' ?>> 4
                </label>
                <label>
                    <input type="radio" name="grade" value="5" <?php if ($grade == 5) echo 'checked' ?>> 5
                </label>
            </div>
            <div class="break"></div>
            <div class="label-cell"><label>Loetud:</label></div>
            <div class="input-cell"><label>
                    <input id="isRead" name="isRead" type="checkbox" value="true" <?php if ($isRead == 'true') echo 'checked' ?>/>
                </label></div>
            <div class="break"></div>
            <div class="label-cell"></div>
            <div class="input-cell">
                <input name="submitButton" type="submit" class="button" value="Salvesta">
                <input name="deleteButton" type="submit" class="deleteButton" value="Kustuta"/>
            </div>
        </form>
    </main>
    <footer>
        ICD007 Näidisrakendus
    </footer>
</div>
</body>
</html>