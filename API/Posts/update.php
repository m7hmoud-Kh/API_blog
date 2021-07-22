<?php

require_once "../postsHeader.php";

header("Access-Control-Allow-Methods: PUT");

$database = new Database();
$db = $database->connect();

$post = new Posts($db);

$data = json_decode(file_get_contents("php://input"));

$post->set_post_id($data->post_id);

$predata = $post->read_single();

if ($predata) {

    $post->set_post_title($predata["post_title"]);
    $post->set_post_desc($predata["post_desc"]);
    $post->set_author($predata["author"]);
    $post->set_post_cate_id($predata["post_cate_id"]);

    if (isset($data->post_title)) {
        $post->set_post_title($data->post_title);
    }
    if (isset($data->post_desc)) {
        $post->set_post_desc($data->post_desc);
    }
    if (isset($data->author)) {
        $post->set_author($data->author);
    }
    if (isset($data->post_cate_id)) {
        $post->set_post_cate_id($data->post_cate_id);
    }

    $result = $post->update();
    $array_post = array();
    if ($result) {
        $array_post["status"]  = 200;
        $array_post["data"] = array(
            "message" => "post update successfully..."
        );
    } else {
        $array_post["status"]  = 404;
        $array_post["data"] = array(
            "message" => "post Not Updated"
        );
    }

    echo json_encode($array_post);
}
