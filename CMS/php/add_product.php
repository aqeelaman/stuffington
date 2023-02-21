<?php

// Include libraries
require __DIR__ . '/vendor/autoload.php';

// Create instance of MongoDB client
$mongoClient = new MongoDB\Client;

// Select a database
$db = $mongoClient->stuffington;

// Select a collection
$collection = $db->product;

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create an array with the product details
    $product = array(
        "productID" => $_POST['productID'],
        "image" => $_POST['image'],
        "name" => $_POST["name"],
        "price" => $_POST['price'],
        "category" => $_POST["category"],
        "size" => $_POST["size"],
        "colour" => $_POST["colour"],
        "stock" => $_POST['stock']
    );

    // Insert the product into the collection
    $result = $collection->insertOne($product);

    // Check if the insertion was successful
    if ($result->getInsertedCount() == 1) {
        echo "Product added successfully!";
    } else {
        echo "Product not added";
    }
}
?>
