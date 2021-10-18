<?php

require_once("author-functions.php");

$names = getAllAuthors();

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

            <a href="index.php" id="book-list-link">Raamatud</a>
            <span>|</span>
            <a href="book-add.php" id="book-form-link">Lisa raamat</a>
            <span>|</span>
            <a href="author-list.php" id="author-list-link">Autorid</a>
            <span>|</span>
            <a href="author-add.php" id="author-form-link">Lisa autor</a>
    </nav>
    <main>
        <br>
        <div id="author-list">
            <div class="header-a">Eesnimi</div>
            <div class="header-b">Perekonnanimi</div>
            <div class="header-hinne">Hinne</div>
            <div class="header-divider"></div>

            <?php foreach ($names as $each): ?>

                <div class="first">
                    <a><?= $each["firstName"] ?></a>
                </div>

                <div class="first">
                    <a><?= $each["lastName"] ?></a>
                </div>

                <div class="break">

                </div>

                <div>
                    <span class="filledStar">★</span>
                    <span class="filledStar">★</span>
                    <span class="filledStar">★</span>
                    <span class="emptyStar">★</span>
                    <span class="emptyStar">★</span>
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