<?php

session_start();

require_once("author-functions.php");

$authors = getAllAuthors();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body id="author-list-page">
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
            <div class="header-a">Eesnimi</div>
            <div class="header-b">Perekonnanimi</div>
            <div class="header-hinne">Hinne</div>
            <div class="header-divider"></div>

            <?php foreach ($authors as $author): ?>

                <div class="first">
                    <a href="edit-author.php?firstName=<?= urlencode($author["firstName"]) ?>"><?= $author["firstName"] ?></a>
                </div>

                <div class="first">
                    <a><?= $author["lastName"] ?></a>
                </div>

                <div class="break">
                </div>

                <div>
                    <a><?= $author["grade"] ?></a>
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