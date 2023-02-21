<?php


// Include libraries
require __DIR__ . '/vendor/autoload.php';

try {

    $mongoClient = new MongoDB\Client('mongodb://localhost:27017');
    $db = $mongoClient->stuffington;

    // Select a collection
    $collection = $db->products;

    $id = $_GET["id"];

    echo $id;

    if (!is_null($id)) {

        $returnVal = $collection->deleteOne($id);

        if ($returnVal['ok'] == 1) {
            header("Location: ../HTML/product.html");
        } else {
            echo 'Failed deleting product!';
        }

    } else {
        echo "Invalid Product!";
    }
    
}
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

?>