<?php
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->stuffington;

//select a collection
$collection = $db->orders;

//extract from session storage
$user = "<script language='JavaScript'>var n=sessionStorage.getItem('user');document.write(n);</script>";

?>
