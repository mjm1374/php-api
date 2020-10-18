<?php
//Header
header('Access-Allow-Control-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

// Instatiate DB

$database =  new Database();
$db =  $database->connect();

// Instaiate blog post 

$post = new Post($db);

//Get Id

$post->id = isset($_GET['id']) ? $_GET['id'] : die();


$post->read_single();

$post_arr =  array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => html_entity_decode($post->body),
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name
);


print_r(json_encode($post_arr));
