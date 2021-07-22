<?php

require_once "../categoryHeader.php";
header('Access-Control-Allow-Methods: DELETE');

$database = new Database();
$db = $database->connect();

$category = new Categories($db);

$data = json_decode(file_get_contents("php://input"));

$array_cat = array();
if ($category->check_id($data->cat_id)) {
    $category->set_cat_id($data->cat_id);
    $result = $category->delete();
    $array_cat["status"] = 200;
    $array_cat["data"] = array(
        "message" => "deleted catgory with this ID",
    );
} else {
    $array_cat["status"] = 404;
    $array_cat["data"] = array(
        "message" => "Not deleted catgory with this ID",
    );
}

echo json_encode($array_cat);
