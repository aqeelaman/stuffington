<!DOCTYPE html>
<html>
    <head>
        <title>Cart Demo</title>
        <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
        <script src="Cart.js"></script>
    </head>

    <?php

        //Connect to MongoDB and select database
        require __DIR__ . '/vendor/autoload.php';
        $mongoClient = (new MongoDB\Client);
        $db = $mongoClient->ecommerce;
        
        //Find all products
        $products = $db->products->find();

      

    ?>

    <body>
        <h1>Shopping Website</h1>

        <!-- PHP loads product information -->        
        
        
        <!-- Displays contents of Cart -->    
        <h2>Cart</h2>
        <div id="CartDiv"></div>
    
    </body>
</html>
        