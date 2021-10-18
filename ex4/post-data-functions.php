<?php

include_once __DIR__ . '/Post.php';

const DATA_FILE = __DIR__ . '/data/posts.txt';
const ID_FILE = __DIR__ . '/data/id.txt';

$post = new Post('Title ccc', 'Text ccc');

$post->id = 5;

savePost($post) ;

printPosts(getAllPosts());

function savePost(Post $post) : string {

    if ($post->id) {
        deletePostById($post->id);
    } else {
        $post->id = getNewId();
    }

    file_put_contents(DATA_FILE, getPostAsLine($post), FILE_APPEND);

    return $post->id;
}

function deletePostById(string $id) : void {
    $contents = "";
    foreach (getAllPosts() as $post) {
        if ($post->id == $id) {
            continue;
        }

        $contents .= getPostAsLine($post);
    }
    file_put_contents(DATA_FILE, $contents);
}

function getPostAsLine($post) : string {
    return urlencode($post->id)
        . ';' . urlencode($post->title)
        . ';' . urlencode($post->text) . PHP_EOL;
}

function getAllPosts() : array {

    $lines = file(DATA_FILE);

    $result = [];
    foreach ($lines as $line) {
        [$id, $title, $text] = explode(';', trim($line));

        $post = new Post(urldecode($title), urldecode($text));

        $post->id = $id;

        $result[] = $post;
    }

    return $result;
}

function getNewId() : string {
    $contents = file_get_contents(ID_FILE);

    $id = intval($contents);

    file_put_contents(ID_FILE, $id + 1);

    return strval($id);
}

function printPosts(array $posts) {
    foreach ($posts as $post) {
        print $post . PHP_EOL;
    }
}