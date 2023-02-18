<?php

// connect to MongoDB
$mongoClient = new MongoDB\Client("mongodb://127.0.0.1:55864");

// select database and collection
$database = $mongoClient->selectDatabase("yourshopping-db");
$productCollection = $database->selectCollection("product");

// get all products
$products = $productCollection->find();

// display products
foreach ($products as $product) {
    echo "ProductID: " . $product['ID'] . "<br>";
    echo "Image: " . $product['image'] . "<br>";
    echo "Name: " . $product['name'] . "<br>";
    echo "Price: " . $product['price'] . "<br>";
    echo "Category: " . $product['category'] . "<br>";
    echo "Size: " . $product['size'] . "<br>";
    echo "Colour: " . $product['colour'] . "<br>";
    echo "Stock: " . $product['stock'] . "<br>"; 
}

// add a new product
$productData = array(
    "productID" => "productID",
    "image" => "product-x.jpg",
    "name" => "name",
    "price" => 29.99,
    "category" => "Teddy",
    "size" => "12'",
    "colour" => "black",
    "stock" => 12,
);
$result = $productCollection->insertOne($productData);
echo "Inserted new product with ID: " . $result->getInsertedId();

// update a product
$productCollection->updateOne(
    array('name' => 'Product A'),
    array('$set' => array('price' => 24.99))
);
echo "Updated product A price to 24.99";

// delete a product
$productCollection->deleteOne(array('name' => 'Product B'));
echo "Deleted product B";

?>




