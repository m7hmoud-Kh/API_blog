<?php

require_once "../postsHeader.php";

$database = new Database();

$db = $database->connect();

$post = new Posts($db);

$post_id = isset($_GET["post_id"]) ? $_GET["post_id"] : die();

$post->set_post_id($post_id);
$result = $post->read_single();
$array_post = array();
if($result)
{
    $array_post["status"] = 200;
    $array_post["data"] = array(
        "post_id" => $result["post_id"],
        "post_title" => $result["post_title"],
        "post_desc" => $result["post_desc"],
        "author" => $result["author"],
        "post_cate_id" => $result["post_cate_id"]
    );
}else
{
    $array_post["status"] = 404;
    $array_post["data"] = array(
        "message" => "not post with this ID"
    );
}
echo json_encode($array_post);