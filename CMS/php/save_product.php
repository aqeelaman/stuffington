<?php


//Include libraries
require __DIR__ . '/vendor/autoload.php';
// function modify_product()
// {
    //Connect to database
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->stuffington;
    $collection = $db->products;

    //Extract the customer details 
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $image_url = filter_input(INPUT_POST, 'image_url', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    $size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);
    $colour = filter_input(INPUT_POST, 'colour', FILTER_SANITIZE_STRING);
    $stock = filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);


    //Construct PHP array with data
    $productData = [
        "name" => $name,
        "image_url" => $image_url,
        "price" => $price,
        "category" => $category,
        "size" => $size,
        "colour" => $colour,
        "stock" => $stock
        //"_id" => $id
    ];
    $findCriteria = [
    '_id' => new MongoDB\BSON\ObjectID($id)
    ];

    //Save the product in the database - it will overwrite the data for the product with this ID
    $returnVal = $collection->updateOne($findCriteria,['$set'=> $productData]);

    if ($returnVal->getModifiedCount() === 1) {
        header("Location: ../html/product.html");
    } else {
        echo 'Error saving product';
    }
//}
?>


