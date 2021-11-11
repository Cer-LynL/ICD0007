<?php

session_start();

require_once("book-functions.php");

$books = getAllBooks();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body id="book-list-page">
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

        <?php if (isset($_SESSION["message"])): ?>
            <div id="message-block" class="message">
                <?php
                echo $_SESSION["message"];
                unset($_SESSION["message"]);
                ?>
            </div>
        <?php endif; ?>

        <br>
        <div id="author-list">
            <div class="header-a">Pealkiri</div>
            <div class="header-b">Autorid</div>
            <div class="header-hinne">Hinne</div>
            <div class="header-divider"></div>

            <?php foreach ($books as $each): ?>

                <div class="first">
                    <a href="edit-book.php?title=<?= urlencode($each["title"]) ?>"><?= $each["title"] ?></a>
                </div>

                <div class="break"></div>

                <div>
                    <a><?= $each["grade"] ?></a>
                </div>

                <div class="break"></div>

            <?php endforeach; ?>

            <div class="break"></div>

        </div>
    </main>
    <footer>
        ICD007 Näidisrakendus
    </footer>
</div>
</body>
</html>