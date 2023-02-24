<?php

require '../php/removeProductFromOrder.php';

if(isset($_POST['deleteproduct'])) {
    $orderId = $_POST['orderId'];
    modify_product($orderId);
}
?>