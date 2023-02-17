<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->stuffington;

//Extract the data that was sent to the server
$category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_GET,'name',FILTER_SANITIZE_STRING);

if ($category != "") {
    //Create a PHP array with our search criteria
    $findCriteria = [
        'category' => $category
    ];

    //Find all of the products that match  this criteria
    $cursor = $db->products->find($findCriteria);
    
} 
else if ($name != ""){
    //Create a PHP array with our search criteria
    $findCriteria = [
        'name' => $name
    ]; 

    //Find all of the customers that match  this criteria
    $cursor = $db->products->find($findCriteria);
    
}
else {
    //find all products
    $cursor = $db->products->find();
}


//Output each product as a JSON object
$jsonProducts = '[';

//work through products
foreach ($cursor as $product) {
    $jsonProducts .= json_encode($product); //Convert PHP representation into JSON 
    $jsonProducts .= ','; //Separator between each element
}

//Remove last comma
$jsonProducts = substr($jsonProducts, 0, strlen($jsonProducts) - 1);

//Close array
$jsonProducts .= ']';

//Echo final string
echo $jsonProducts;

?>