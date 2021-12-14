<?php

session_start();

require_once("book-functions.php");

$books = getAllBooks();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Raamatute nimekiri</title>
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

        <?php if (isset($_SESSION["delete_message"])): ?>
            <div id="message-block" class="alert">
                <?php
                echo $_SESSION["delete_message"];
                unset($_SESSION["delete_message"]);
                ?>
            </div>
        <?php endif; ?>

        <br>
        <div id="author-list">
            <div class="header-a">Pealkiri</div>
            <div class="header-b">Autorid</div>
            <div class="header-hinne">Hinne</div>
            <div class="header-divider"></div>

            <?php foreach ($books as $book): ?>

                <div class="first">
                    <a href="edit-book.php?book_id=<?= urlencode($book[0]) ?>"><?= $book[1] ?></a>
                </div>

                <div class="first">
                    <?php foreach (getAuthor($book[0]) as $index => $author_id): ?>
                        <?= $author_id[0] ?> <?= $author_id[1] ?>
                    <?php endforeach; ?>

                </div>

                <div class="emptyStar">
                    <?php foreach (range(1, 5) as $grade): ?>
                        <span class="<?= $book[2] >= $grade
                            ? 'filledStar' : ''  ?>">&#9733;</span>
                    <?php endforeach; ?>
                </div>

                <div class="break"></div>

            <?php endforeach; ?>

        </div>
    </main>
    <footer>
        ICD007 Näidisrakendus
    </footer>
</div>
</body>
</html>