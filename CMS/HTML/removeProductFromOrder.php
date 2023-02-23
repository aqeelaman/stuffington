removeProductFromOrder.php

<?php

require __DIR__ . '/vendor/autoload.php';

function removeProductFromOrder($orderId, $productId) {
    $mongoClient = new MongoDB\Client;
    $db = $mongoClient->stuffington;
    $collection = $db->order;

    $updateResult = $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($orderId)],
        ['$pull' => ['products' => ['product_id' => new MongoDB\BSON\ObjectID($productId)]]]
    );

    if ($updateResult->getModifiedCount() == 1) {
        header("Location: ../HTML/order.html");
        exit();
    } else {
        echo "Failed removing product from order!";
    }
}
?>