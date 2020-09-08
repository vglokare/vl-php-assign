<?php
header("Content-type: application/json");
require 'data.php';
// include 'Data.php';

$req = $_GET['req'] ?? null;

if ($req) {
    $jsonData = file_get_contents("restaurant.json");
    $dataList = json_decode($jsonData, true)['menu_items'];
    try {
        $restaurantData = new RestaurantData($dataList);
    } catch (Exception $th) {
        echo json_encode([$th->getMessage()]);
        return;
    }
}

switch ($req) {
    case 'name_list':
        echo $restaurantData->getItemName();
        break;

    case "restaurant_data":
        $prn = $_GET['id'] ?? null;
        echo $restaurantData->getFoodById($id);
        break;
    
    default:
        echo json_encode(["In-valid request"]);
        break;
}

?>