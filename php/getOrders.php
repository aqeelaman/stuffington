<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->stuffington;

//Extract the data that was sent to the server
$function = filter_input(INPUT_GET, "function", FILTER_SANITIZE_STRING);
$custId = filter_input(INPUT_GET, 'custId', FILTER_SANITIZE_STRING);
$orderId = filter_input(INPUT_GET, "orderId", FILTER_SANITIZE_STRING);


//if function is to get order by customer id
if ($function == "customer") {

    $cursor = $db->order->find(["customer_id" => new MongoDB\BSON\ObjectID($custId)]);
} 
//if function is to get order by order id
else {
    $cursor = $db->order->find(["_id" => new MongoDB\BSON\ObjectID($orderId)]);
}


//Output each order as a JSON object
$jsonProducts = '[';

//work through order
foreach ($cursor as $product) {
    $jsonProducts .= json_encode($product); //Convert PHP representation into JSON 
    $jsonProducts .= ','; //Separator between each element
}

//Remove last comma
$jsonProducts = substr($jsonProducts, 0, strlen($jsonProducts) - 1);

//Close array
$jsonProducts .= ']';

//Echo final string
echo $jsonProducts;

?>