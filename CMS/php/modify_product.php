<?php
// order delete option

require '../php/removeProductFromOrder.php';

if(isset($_POST['deleteproduct'])) {
    // delete product by accessing orderID
    $orderId = $_POST['orderId'];
    modify_product($orderId);
}
?>