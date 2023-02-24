<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->stuffington;

// get all Orders
$cursor = $db->order->find();


// display Orders
//Output each product as a JSON object
$jsonorder = '[';

//work through products
foreach ($cursor as $order) {
    $jsonorder .= json_encode($order); //Convert PHP representation into JSON 
    $jsonorder .= ','; //Separator between each element
}

//Remove last comma
$jsonorder = substr($jsonorder, 0, strlen($jsonorder) - 1);

//Close array
$jsonorder .= ']';

//Echo final string
echo $jsonorder;

?>






