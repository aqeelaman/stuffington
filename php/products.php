<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->stuffington;

//Extract the data that was sent to the server

$category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
$sizeStr = filter_input(INPUT_GET, 'size', FILTER_SANITIZE_NUMBER_INT);
$size = intval($sizeStr);
$minStr = filter_input(INPUT_GET, 'min', FILTER_SANITIZE_NUMBER_INT);
$min = intval($minStr);
$maxStr = filter_input(INPUT_GET, 'max', FILTER_SANITIZE_NUMBER_INT);
$max = intval($maxStr);
$search_string = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);



$findCriteria = [];
$sort=[];
// search by category
if ($category != "") {
    //Create a PHP array with our search criteria
    $findCriteria = array('category' => $category);
}

//search by name 
else if ($name != "") {
    //Create a PHP array with our search criteria
    $findCriteria = ['name' => $name,];
}

//search by size
else if ($size > 0) {
    //Create a PHP array with our search criteria
    $findCriteria = ['size' => $size];
} 

//search and sort by price
else if ($min > 0 && $max > 0) {
    $findCriteria = ['price' => array('$gte' => $min, '$lte' => $max), ];
    $sort= ['sort' => ["price" => 1],];
}

else if ($search_string != ""){
    $findCriteria = [
        '$text' => [ '$search' => $search_string ] 
    ];
}



// $cursor = $db->products->find($findCriteria);
$cursor = $db->products->find($findCriteria,$sort);

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