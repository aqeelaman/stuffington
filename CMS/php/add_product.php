<?php

// Include libraries
require __DIR__ . '/vendor/autoload.php';

try {
    // Create instance of MongoDB client
    $mongoClient = new MongoDB\Client('mongodb://localhost:27017');

    // Select a database
    $db = $mongoClient->stuffington;

    // Select a collection
    $collection = $db->products;

    $filename_ext = "";
    if (($_FILES['imageToUpload']['name'] != "")) {
        // Where the file is going to be stored
        $target_dir = "../../images/StuffedToys/";
        $target_dir2 = "../images/StuffedToys/";
        $file = $_FILES['imageToUpload']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];

        $filename = str_replace(" ", "", $filename);

        $ext = $path['extension'];
        $temp_name = $_FILES['imageToUpload']['tmp_name'];
        $path_filename_ext = $target_dir . $filename . "." . $ext;
        $path_filename_ext_save = $target_dir2 . $filename . "." . $ext;
        $filename_ext = $filename . "." . $ext;
        $filename_ext2 = "../" + $filename_ext;

        move_uploaded_file($temp_name, $path_filename_ext);
    }

    //Collect Inputs
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $priceStr = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
    $price = floatval($priceStr);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    $sizeStr = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);
    $size = intval($sizeStr);
    $colour = filter_input(INPUT_POST, 'colour', FILTER_SANITIZE_STRING);
    $stockStr = filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_STRING);
    $stock = intval($stockStr);

    // Check if the form has been submitted
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Create an array with the product details
    // $product = array(
    //     "image" => $_POST['image'],
    //     "name" => $_POST["name"],
    //     "price" => $_POST['price'],
    //     "category" => $_POST["category"],
    //     "size" => $_POST["size"],
    //     "colour" => $_POST["colour"],
    //     "stock" => $_POST['stock']
    // );

    $product = [
        "name" => $name,
        "image_url" => $path_filename_ext_save,
        "price" => $price,
        "category" => $category,
        "size" => $size,
        "colour" => $colour,
        "stock" => $stock,
    ];



    // Insert the product into the collection
    $result = $collection->insertOne($product);





    //Check if the insertion was successful
    if ($result->getInsertedCount() == 1) {
        header("Location: ../HTML/product.html");
    } else {
        echo "Product not added";
    }


}

//catch exception
catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}


?>