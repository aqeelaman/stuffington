<?php
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->stuffington;

//select a collection
$collection = $db->orders;

//extract from session storage
//$user = "<script language='JavaScript'>var n=sessionStorage.getItem('user');document.write(n);</script>";

//$customer_idStr = filter_input(INPUT_POST, 'customer_id', FILTER_SANITIZE_STRING);
//$shipping_address = filter_input(INPUT_POST, 'shipping_array',FILTER_SANITIZE_STRING);
//$totalStr = filter_input(INPUT_POST,"price",FILTER_SANITIZE_STRING);
$productList = file_get_contents( "php://input" );
//$productList = json_decode($productList);
//filter_input(INPUT_POST,"cartList",FILTER_SANITIZE_STRIPPED);

//$price = $productList["price"];
echo $productList;
?>
