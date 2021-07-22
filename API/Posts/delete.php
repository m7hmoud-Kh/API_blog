<?php

require_once "../postsHeader.php";
header("Access-Control-Allow-Methods:DELETE");


$database = new Database();
$db = $database->connect();

$post = new Posts($db);

$data = json_decode(file_get_contents("php://input"));

$checkID =  $post->checkPostId($data->post_id);

if($checkID)
{
    $post->set_post_id($data->post_id);
    $result =  $post->delete();
    $array_post = array();
    if($result)
    {
        $array_post["status"] = 200;
        $array_post["data"] = array(
            "message" => "post deleted successfully"
        );
    }
}
else
{

        $array_post["status"] = 404;
        $array_post["data"] = array(
            "message" => "post NOT deleted...!"
        );

}
echo json_encode($array_post);
