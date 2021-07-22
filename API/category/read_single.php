<?php

require_once "../categoryHeader.php";

$database = new Database();

$db = $database->connect();

$category = new Categories($db);

$data = isset($_GET["cat_id"]) ? $_GET["cat_id"] : die();


$category->set_cat_id($data);

$result = $category->read_single();

$array_cat = array();
if($result)
{
    $array_cat["status"] = 200;
    $array_cat["data"] = array();
    $cat_item = array(
        "cat_id" => $result["cat_id"],
        "cat_name" => $result["cat_name"],
        "created_at"=>  $result["created_at"],
    );
    array_push( $array_cat["data"] ,  $cat_item);
}else
{
    $array_cat["status"] = 404;
    $array_cat["data"] =array(
        "message" => "not found category with this Id",
    );
}
echo json_encode($array_cat);



