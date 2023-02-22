<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->stuffington;

// get all products
$cursor = $db->customers->find();


// display products
//Output each product as a JSON object
$jsonCustomers = '[';

//work through products
foreach ($cursor as $customer) {
    $jsonCustomers .= json_encode($customer); //Convert PHP representation into JSON 
    $jsonCustomers .= ','; //Separator between each element
}

//Remove last comma
$jsonCustomers = substr($jsonCustomers, 0, strlen($jsonCustomers) - 1);

//Close array
$jsonCustomers .= ']';

//Echo final string
echo $jsonCustomers;


?>






