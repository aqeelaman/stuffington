<?php

require __DIR__ . '/vendor/autoload.php';
try {
    function removeProductFromOrder($orderId)
    {
        $mongoClient = new MongoDB\Client;
        $db = $mongoClient->stuffington;
        $collection = $db->order;
       
        
        $updateResult = $collection->deleteOne(
            ['_id' => new MongoDB\BSON\ObjectID($orderId)]
        );
        

        if ($updateResult->getDeletedCount() == 1) {
            header("Location: ../HTML/order.html");
            exit();
        } else {
            echo "Failed removing product from order!";
        }
    }

}

//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>