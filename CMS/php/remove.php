<?php

require 'removeProductFromOrder.php';

if(isset($_POST['deleteproduct'])) {
    $orderId = $_POST['orderId'];
    $productId = $_POST['productId'];
    removeProductFromOrder($orderId, $productId);
}
?>