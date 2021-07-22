<?php

require_once "../postsHeader.php";
header("Access-Control-Allow-Methods: POST");


$database = new Database();

$db = $database->connect();

$post = new Posts($db);

$data = json_decode(file_get_contents("php://input"));

$post->set_post_id($data->post_id);
$post->set_post_title ($data->post_title );
$post->set_post_desc($data->post_desc);
$post->set_author($data->author);
$post->set_post_cate_id ($data->post_cate_id);

$result = $post->creat();
$array_post = array();
if($result)
{
    $array_post["status"] = 200;
    $array_post["data"] = array(
        "message" => "post added successfully..."
    );
}else
{
    $array_post["status"] = 404;
    $array_post["data"] = array(
        "message" => "Error for add posts...!"
    );
}
echo json_encode($array_post);





