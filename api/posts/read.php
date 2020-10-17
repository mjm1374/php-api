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

// Blog post query

$result =  $post->read();
$rowCnt =  $result->rowCount();

if ($rowCnt > 0) {
    $post_arr = array();
    $post_arr['data'] =  array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item =  array(
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name' => $category_name
        );

        array_push($post_arr['data'], $post_item);
    }

    //Turn to json
    echo json_encode($post_arr);
} else {
    echo json_encode(array('messge' => 'No posts'));
}
