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
            <i class='bx bx-collection'></i>
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
            <i class='bx bx-collection'></i>
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
            <i class='bx bx-collection'></i>
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
    <div class="form">
      <div class="title">Modify the Details of the Product</div>

      
      <form action="save_product.php" method="post">

<?php


//Include libraries
require __DIR__ . '/vendor/autoload.php';
    //Connect to MongoDB
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->stuffington;

    //Get ID from link
    $link = $_GET['name'];
    
echo $link;
    

//Create a PHP array with our search criteria
$findCriteria = [
    'name' => $link
 ];

//Find all of the products that match  this criteria
$cursor = $db->products->findOne($findCriteria);


echo '<div class="input-container ic1">
        <input id="id" class="input" type="text" placeholder=" " value='.$cursor['_id'].' />
        <div class="cut"></div>
        <label for="name" class="placeholder">Full ID of the product to be modified </label>
      </div>';

echo '<input id="image_url" class="input" type="hidden" placeholder=" " value='.$cursor['image_url'].' />';

echo '<div class="input-container ic1">
        <input id="name" class="input" type="text" placeholder=" " value='.$cursor['name'].'/>
        <div class="cut"></div>
        <label for="name" class="placeholder">Full Name of product to be modified</label>
      </div>';

echo '<div class="input-container ic1">
        <input id="price" class="input" type="text" placeholder=" " value='.$cursor['price'].' />
        <div class="cut"></div>
        <label for="price" class="placeholder">Price in AED</label>
      </div>';

echo '<div class="input-container ic2">
        <input id="category" class="input" type="text" placeholder=" " value='.$cursor['category'].' />
        <div class="cut"></div>
        <label for="category" class="placeholder">Category</label>
      </div>';

echo '<div class="input-container ic2">
        <input id="size" class="input" type="text" placeholder=" " value='.$cursor['size'].' />
        <div class="cut cut-short"></div>
        <label for="size" class="placeholder">Size in inches</>
      </div>';

echo '<div class="input-container ic2">
        <input id="colour" class="input" type="text" placeholder=" "  value='.$cursor['colour'].' />
        <div class="cut cut-short"></div>
        <label for="colour" class="placeholder">Colour of Product</>
      </div>';

echo '<div class="input-container ic2">
        <input id="stock" class="input" type="text" placeholder=" " value='.$cursor['stock'].' />
        <div class="cut cut-short"></div>
        <label for="stock" class="placeholder">Stock Available</>
      </div>';

  ?>

  


        <!-- id of product -->
      

      <!-- name of product -->
      

      <!-- image -->
      <!-- <div class="input-container ic1">
        <input id="image" class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="image" class="placeholder">Place an image of the new Product</label>
      </div> -->


      <!-- price -->
      

      <!-- category -->
      

      <!-- size -->
      

      <!-- colour -->
      
      <!-- stock -->
      



      <!-- submit btn that redirects to products page and shows the modified data -->
      <a href="product.html">
        <button type="submit" class="submit" href="product.html">Modify Entry</button>
      </a>
    </form>

    </div>



<script src='../JS/navigation.js'></script>

</body>
</html>