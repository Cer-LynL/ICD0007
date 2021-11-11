<?php

session_start();

require_once("author-functions.php");

$authors = getAllAuthors();

$errors = [];
$firstName = "";
$lastName = "";
$grade = "";

$author = null;

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["firstName"])) {
        $author = getBookByAuthor($_GET["firstName"]);

        $firstName = $author["firstName"];
        $lastName = $author["lastName"];
        $grade = $author["grade"];

    }

}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
//    editAuthor($originalFirst, $originalLast, $firstName, $lastName, $grade);

    if (isset($_POST["deleteButton"])) {
        $firstName = $_POST["first-to-delete"];
        $lastName = $_POST["last-to-delete"];

        deleteAuthor($firstName, $lastName);

        header("Location: /author-list.php");
    } else {
        $originalFirst = $_POST["first-to-delete"] ?? "";
        $originalLast = $_POST["last-to-delete"] ?? "";
        $firstName = $_POST["firstName"] ?? "";
        $lastName = $_POST["lastName"] ?? "";
        $grade = $_POST["grade"] ?? "";

        if (strlen($firstName) < 1 || strlen($firstName) > 21) {
            $errors[] = "Eesnime pikkus on 1 kuni 21 tähemärki!";
        }
        if (strlen($lastName) < 2 || strlen($lastName) > 22) {
            $errors[] = "Perenime pikkus on 2 kuni 22 tähemärki!";
        }
        if (empty($errors)) {
            deleteAuthor($originalFirst, $originalLast);
            saveAuthor($firstName, $lastName, $grade);
            $_SESSION["message"] = "Lisatud!";
            header("Location: /author-list.php");
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
<body id="author-form-page">
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
                    <?= $error ?><br>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form id="input-form" action="edit-author.php" method="post">

            <input name="id" type="hidden" value="2">

            <div class="label-cell">
                <label for="name">Eesnimi:</label>
            </div>
            <div class="input-cell">
                <input id="name" name="firstName" value="<?= $author["firstName"] ?>" type="text"/>
                <input type="hidden" name="originalName" value="<?= $author["firstName"] ?>"/>
            </div>

            <div class="label-cell">
                <label for="last-name">Perekonnanimi:</label>
            </div>
            <div class="input-cell">
                <input id="last-name" name="lastName" value="<?= $author["lastName"] ?>" type="text"/>
            </div>

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
            <div class="label-cell"></div>
            <div class="input-cell">
                <input name="submitButton" type="submit" class="button" value="Salvesta">
                <input name="first-to-delete" type="hidden" value="<?= $firstName ?>">
                <input name="last-to-delete" type="hidden" value="<?= $lastName ?>"/>
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