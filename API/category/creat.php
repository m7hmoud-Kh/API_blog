<?php
// Headers
require_once "../categoryHeader.php";
header('Access-Control-Allow-Methods: POST');

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();


$category = new Categories($db);

$data = json_decode(file_get_contents("php://input"));

$category->set_cat_name($data->cat_name);
$category->set_created_at($data->created_at);



if ($category->creat()) {
    echo json_encode(
        array("message" => "category added successfully...!")
    );
} else {
    echo json_encode(
        array("message" => "error get...!")
    );
}
