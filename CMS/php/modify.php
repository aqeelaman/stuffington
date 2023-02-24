<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Modify | CMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- custom css -->
  <link rel="stylesheet" href="../CSS/styles.css">
  <link rel="stylesheet" href="../CSS/navigation.css">
  <link rel="stylesheet" href="../CSS/container.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <!-- Link to favicon -->
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
  

<body>

  <div class="bg-image"></div>

    <div class="title">
      <h1>Modify Details</h1>
    </div>

  <!-- navigation bar -->
  <div class="sidebar close">
    <div class="logo-details">
      <!-- redirct to main.html 'onclick' = logo -->
      <a href="main.html">
        <img src="../images/bear.png" style="width: 40px; margin-left:22px">
        <span class="logo_name">StuffingTon</span>
    </div>


    <ul class="nav-links">
      <!--StuffingTon-->
      <li>
        <div class="iocn-link">
          <a href="product.html">
            <i class='bx bx-collection'></i>
            <!-- category : product -->
            <span class="link_name">Product</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <!-- dropdown menu for product category -->
          <li><a class="link_name" href="product.html">Product</a></li>
          <li><a href="add.html">Add Product</a></li>
        </ul>
      </li>

      <!-- Customer -->
      <li>
        <div class="iocn-link">
          <a href="customer.html">
            <i class='fa fa-users'></i>
            <!-- category : customer -->
            <span class="link_name">Customer</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>

        <ul class="sub-menu">
          <li><a class="link_name" href="product.html">Customer</a></li>
        </ul>
      </li>

      <!-- Order history -->
      <li>
        <div class="iocn-link">
          <a href="order.html">
            <i class='fa fa-cart-shopping'></i>
            <!-- category : order -->
            <span class="link_name">Orders</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>

        <ul class="sub-menu">
          <li><a class="link_name" href="product.html">Order</a></li>
        </ul>
      </li>

      <!-- Admin -->
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='fa fa-users-rays'></i>
            <span class="link_name"></span>
            <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <!-- Admin -->
          <li><a class="link_name" href="#">StuffingTon Admin</a></li>
          <li><a href="#">Aqeel Aman Ali - M00850498</a></li>
          <li><a href="#">Kurt Patawaran - M00850500</a></li>
          <li><a href="#">Hooda AbdulShakoor - M00849592</a></li>
        </ul>
      </li>

    </ul>
  </div>

    <!-- Product modification -->
    <div class="form"> <!--Form Start-->
      <div class="title">Modify the Details of the Product</div>

      <!-- Access form from save_products.php -->
      <form action="save_product.php" method="post">

<?php


//Include libraries
require __DIR__ . '/vendor/autoload.php';
    //Connect to MongoDB
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->stuffington;

    //Get ID from link
    $id = $_GET['id'];
    

    

//Create a PHP array with our search criteria
$findCriteria = [
    '_id' => new MongoDB\BSON\ObjectID($id)
 ];

//Find all of the products that match  this criteria
$cursor = $db->products->findOne($findCriteria);


// ID of products (hidden)
echo '<div class="input-container ic1">
        <input class="input" type="text" placeholder=" " value="'.$cursor['_id'].'" disabled/>
        <div class="cut"></div>
        <label for="name" class="placeholder">Full ID of the product to be modified </label>
         <input name="id" type="hidden" value="'.$cursor['_id'].'"/>
      </div>';

// Image
echo '<input name="image_url" class="input" type="hidden" placeholder=" " value="'.$cursor['image_url'].'" />';

// Name
echo '<div class="input-container ic1">
        <input name="name" class="input" type="text" placeholder=" " value="'.$cursor['name'].'"/>
        <div class="cut"></div>
        <label for="name" class="placeholder">Full Name of product to be modified</label>
      </div>';

// Price
echo '<div class="input-container ic1">
        <input name="price" class="input" type="text" placeholder=" " value="'.$cursor['price'].'" />
        <div class="cut"></div>
        <label for="price" class="placeholder">Price in AED</label>
      </div>';

// Category
echo '<div class="input-container ic2">
        <input name="category" class="input" type="text" placeholder=" " value="'.$cursor['category'].'" />
        <div class="cut"></div>
        <label for="category" class="placeholder">Category</label>
      </div>';

// Size
echo '<div class="input-container ic2">
        <input name="size" class="input" type="text" placeholder=" " value="'.$cursor['size'].'" />
        <div class="cut cut-short"></div>
        <label for="size" class="placeholder">Size in inches</>
      </div>';

// Colour
echo '<div class="input-container ic2">
        <input name="colour" class="input" type="text" placeholder=" "  value="'.$cursor['colour'].'" />
        <div class="cut cut-short"></div>
        <label for="colour" class="placeholder">Colour of Product</>
      </div>';

// Stock
echo '<div class="input-container ic2">
        <input name="stock" class="input" type="text" placeholder=" " value="'.$cursor['stock'].'" />
        <div class="cut cut-short"></div>
        <label for="stock" class="placeholder">Stock Available</>
      </div>';

  ?>

  

      <!-- submit btn that redirects to products page and shows the modified data -->
        <button type="submit" class="submit">Modify Entry</button>
      
    </form>

    </div>



<script src='../JS/navigation.js'></script>

</body>
</html>