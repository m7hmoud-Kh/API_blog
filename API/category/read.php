<?php

require_once "../categoryHeader.php";


$database = new Database();

$db = $database->connect();

$category = new Categories($db);

$result = $category->read_all();

$num = $result->rowCount();
$array_cat = array();
if($num > 0)
{
    $array_cat["status"] = 200;
    $array_cat["data"] = array();
    foreach($result as $re)
    {
        $cat_item = array(
            "id" => $re["cat_id"],
            "cat_name" => $re["cat_name"],
            "created_at" => $re["created_at"],
        );
        array_push($array_cat["data"],$cat_item);
    }
}else {
    $array_cat["status"] = 404;
    $array_cat["data"] = "not found category";
}
echo json_encode($array_cat);


