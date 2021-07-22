<?php

require_once "../categoryHeader.php";

header("Access-Control-Allow-Methods: PUT");

$database = new Database();

$db = $database->connect();

$category = new Categories($db);

$data = json_decode(file_get_contents("php://input"));

$category->set_cat_id($data->cat_id);

$predata =  $category->read_single();

$category->set_cat_name($predata["cat_name"]);
$category->set_created_at($predata["created_at"]);

if ($predata) {


    if (isset($data->cat_name)) {
        $category->set_cat_name($data->cat_name);
    }
    if (isset($data->created_at)) {
        $category->set_created_at($data->created_at);
    }
    $result = $category->update();
    $array_cat = array();
    if ($result) {
        $array_cat["status"] = 200;
        $array_cat["data"] = array(
            "message" => "category Updated ....!",
        );
    } else {
        $array_cat["status"] = 404;
        $array_cat["data"] = array(
            "message" => "category Not Updated ....!",
        );
    }
    echo json_encode($array_cat);
}
