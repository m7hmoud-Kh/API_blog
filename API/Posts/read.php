<?php

require_once "../postsHeader.php";


$database = new Database();
$db = $database->connect();

$post = new Posts($db);

$result = $post->read_all();
$post_array = array();
if($result)
{
    $post_array["status"] = 200;
    $post_array["data"] = array();
    foreach($result as $re)
    {
        $post_item = array(
            "post_id" => $re["post_id"],
            "post_title" => $re["post_title"],
            "post_desc" => $re["post_desc"],
            "author" => $re["author"],
            "post_cate_id" => $re["post_cate_id"]
        );
        array_push($post_array["data"],$post_item);
    }
}else
{
    $post_array["status"] = 404;
    $post_array["data"] = array(
        "message" => "Not found posts "
    );
}
echo json_encode($post_array);
