<?php

include_once __DIR__ . '/Post.php';

const DATA_FILE = __DIR__ . '/data/posts.txt';


function getAllPosts() : array {

    $lines = file(DATA_FILE);

    $result = [];

    foreach ($lines as $line) {
        [$title, $text] = explode(";", trim($line));

        $result[] = new Post(urldecode($title), urldecode($text));
    }

    return $result;
}

function savePost(Post $post) : void {

    $line = urlencode($post->title) . ";" . urlencode($post->text) . PHP_EOL;

    file_put_contents(DATA_FILE, $line, FILE_APPEND);

}

function printPosts(array $posts) {
    foreach ($posts as $post) {
        print $post . PHP_EOL;
    }
}