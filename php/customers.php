<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->stuffington;

//Select a collection 
$collection = $db->customers;

//Extract the data that was sent to the server
$function = filter_input(INPUT_POST, 'function', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);

//Convert to PHP array
$dataArray = [
    "name" => $name,
    "email" => $email,
    "password" => $password,
    "dob" => $dob
];

//if function is view
if ($function == "view") {
    $cursor = $db->customers->find();
    
    //Output each customer as a JSON object
    $jsonCustomers = '[';

    //work through customers
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
} 

//if function is add
elseif ($function == "add") {

    //Add the new customer to the database
    $insertResult = $collection->insertOne($dataArray);

    //Echo result back to user
    if ($insertResult->getInsertedCount() == 1) {
        echo 'Customer Registered Successfully. Continue Shopping';
    } else {
        echo 'Error adding customer';
    }
}
//for finding customer
else {

    $cursor = $db->customers->findOne(["_id" => new MongoDB\BSON\ObjectID($id)]);

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

} 


?>