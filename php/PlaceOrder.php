<?php
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->stuffington;

//select a collection
$collection = $db->order;


//Extract the data that was sent to the server
$customer_idStr = filter_input(INPUT_POST, 'customer_id', FILTER_SANITIZE_STRING);
$shipping_address = filter_input(INPUT_POST, 'shipping_address', FILTER_SANITIZE_STRING);
$totalStr = filter_input(INPUT_POST, "total", FILTER_SANITIZE_STRING);
$total = floatval($totalStr);
$prodIdStr = filter_input(INPUT_POST, 'prodId', FILTER_SANITIZE_STRING);
$qtyStr = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_STRING);
$qty = intval($qtyStr);


//setting timezone for database
date_default_timezone_set("Asia/Dubai");

//Convert to PHP array
$order = [
    "customer_id" => new MongoDB\BSON\ObjectID($customer_idStr),
    "shipping_address" => $shipping_address,
    "date" => date("d/m/Y"),
    "time" => date("H:i"),
    "price" => $total,
    "products" => array(
        "product_id" => new MongoDB\BSON\ObjectID($prodIdStr),
        "quantity" => $qty
    )
];

//Add the new order to the database
$result = $collection->insertOne($order);

//Check if the insertion was successful
if ($result->getInsertedCount() == 1) {
    echo $result->getInsertedID();//returns order id 
} else {
    echo "Order not added";
}

?>