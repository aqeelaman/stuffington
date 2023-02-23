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

// add a new product
//$product = array(
  //  "productID" => "productID",
    //"image" => "product-x.jpg",
  //  "name" => "name",
//     "price" => 29.99,
//     "category" => "Product Category",
//     "size" => "12'",
//     "colour" => "Product Colour",
//     "stock" => 12,
// );
// $result = $productCollection->insertOne($product);

// if ($result->getInsertedCount() == 1) {
//     echo "Prodcut added Successfully";
// } else {
//     echo "Product not added.";
// }

// // update a product
// $productCollection->updateOne(
//     array('name' => 'Product A'),
//     array('$set' => array('price' => 24.99))
// );
// echo "Updated product A price to 24.99";

// // delete a product
// $productCollection->deleteOne(array('name' => 'Product B'));
// echo "Deleted product B";



?>






