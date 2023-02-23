<?php

require __DIR__ . '/vendor/autoload.php';

$mongoClient = new MongoDB\Client;

$db = $mongoClient->stuffington;
$collection = $db->Order;

$OrderID = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

$DeleteCriteria = [
    "OrderID" => $OrderID
];

$returnVal = $collection->deleteOne($DeleteCriteria);

if ($returnVal->getDeletedCount() == 1) {
    header("Location: ../HTML/order.html");
} else {

    echo "Order not deleted";
}

?>