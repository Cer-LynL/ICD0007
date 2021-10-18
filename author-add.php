<?php
require_once("author-functions.php");

$firstName = '';
$grade = '';
$lastName = '';

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
        <form id="input-form" action="author-submit-form.php" method="post">
            <div class="label-cell">
                <label for="firstName">Eesnimi: </label>
            </div>
            <div class="input-cell">
                <input id="firstName" name="firstName" type='text' value="<?= $firstName ?>">
            </div>
            <div class="break"></div>
            <div class="label-cell">
                <label for="lastName">Perekonnanimi: </label>
            </div>
            <div class="input-cell">
                <input id="lastName" name="lastName" type='text' value="<?= $lastName ?>">
            </div>
            <div class="break"></div>
            <div class="label-cell">Hinne: </div>
            <div class="input-cell">
                <label>
                    <input type="radio" name="grade" value="1"> 1
                </label>
                <label>
                    <input type="radio" name="grade" value="2"> 2
                </label>
                <label>
                    <input type="radio" name="grade" value="3"> 3
                </label>
                <label>
                    <input type="radio" name="grade" value="4"> 4
                </label>
                <label>
                    <input type="radio" name="grade" value="5"> 5
                </label>
            </div>
            <div class="break"></div>
            <div class="label-cell"></div>
            <div class="input-cell">
                <input name="submitButton" type="submit" class="button" value="Salvesta">
            </div>
        </form>
    </main>
    <footer>
        ICD007 Näidisrakendus
    </footer>
</div>
</body>
</html>