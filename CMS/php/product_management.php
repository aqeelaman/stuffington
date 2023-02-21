<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->stuffington;

// get all products
$cursor = $db->products->find();


// display products
//Output each product as a JSON object
$jsonProducts = '[';

//work through products
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

// // add a new product
// $productData = array(
//     "productID" => "productID",
//     "image" => "product-x.jpg",
//     "name" => "name",
//     "price" => 29.99,
//     "category" => "Teddy",
//     "size" => "12'",
//     "colour" => "black",
//     "stock" => 12,
// );
// $result = $productCollection->insertOne($productData);
// echo "Inserted new product with ID: " . $result->getInsertedId();

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






