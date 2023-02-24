<?php

require '../php/removeOrder.php';

if(isset($_POST['deleteproduct'])) {
    $orderId = $_POST['orderId'];
    removeOrder($orderId);
}
?>

