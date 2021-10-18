<?php
require_once("book-functions.php");

$title = "";
$grade = "";
$isRead = "";

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
        <form id="input-form" action="book-submit-form.php" method="post">
            <div class="label-cell">
                <label for="title">Pealkiri: </label>
            </div>
            <div class="input-cell">
                <input id="title" name="title" type='text' value="<?= $title ?>">
            </div>
            <div class="break"></div>
            <div class="label-cell"><label>Autor 1: </label></div>
            <div class="input-cell">
                <label>
                    <select>
                        <option></option>
                        <option value="o1">Kai-Fu Lee</option>c
                        <option value="o2">Brian Christian</option>
                        <option value="o3">Tony Saldanha</option>
                        <option value="o4">Alessandro Parisi</option>
                        <option value="o5">Tom Griffiths</option>
                    </select>
                </label>
            </div>
            <div class="break"></div>
            <div class="label-cell"><label>Autor 2: </label></div>
            <div class="input-cell">
                <label>
                    <select>
                        <option></option>
                        <option value="o1">Kai-Fu Lee</option>
                        <option value="o2">Brian Christian</option>
                        <option value="o3">Tony Saldanha</option>
                        <option value="o4">Alessandro Parisi</option>
                        <option value="o5">Tom Griffiths</option>
                    </select>
                </label>
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
            <div class="label-cell"><label>Loetud:</label></div>
            <div class="input-cell"><label>
                <input id="isRead" name="isRead" type="checkbox" />
            </label></div>
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