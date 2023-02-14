<?php
//Include the PHP functions to be used on the page 
include('common.php');

//Output header and navigation 
outputHeader("Home");
navigationBar();
?>

<!-- Contents of the page -->
<!--div for advertisement carousel-->
<div class="featured_container">
    <span id="slide-1"></span>
    <span id="slide-2"></span>
    <span id="slide-3"></span>
    <div class="image-container">
        <img src="../images/stuffingtonAd1.png" class="slide" width="1063.3px" height="500px" />
        <img src="../images/stuffingtonAd2.png" class="slide" width="1063.3px" height="500px" />
        <img src="../images/stuffingtonAd3.png" class="slide" width="1063.3px" height="500px" />
    </div>
    <div class="dots">
        <a href="#slide-1"></a>
        <a href="#slide-2"></a>
        <a href="#slide-3"></a>
    </div>
</div>


<h1 class="heading">FEATURED STUFFED TOYS</h1>

<!-- div for displaying featured products -->
<div class="products">
    <a href="Products/brownBunny.html">
        <div class="card">
            <img src="../images/StuffedToys/HousePets/BrownBunny.jpg" alt="BrownBunny" style="width: 100%;">
            <h1>Brown Bunny</h1>
            <p class="price">AED50.00</p>
            <p><button>Add to Cart</button></p>
        </div>
    </a>
    <a href="Products/blackDragon.html">
        <div class="card">
            <img src="../images/StuffedToys/Mythical/BlackDragon.jpg" alt="BlackDragon" style="width: 100%;">
            <h1>Black Dragon</h1>
            <p class="price">AED75.00</p>
            <p><button>Add to Cart</button></p>
        </div>
    </a>
    <a href="Products/brownBear.html">
        <div class="card">
            <img src="../images/StuffedToys/TeddyBear/BrownBear.jpg" alt="BrownBear" style="width: 100%;">
            <h1>Brown Bear</h1>
            <p class="price">AED70.95</p>
            <p><button>Add to Cart</button></p>
        </div>
    </a>
    <a href="Products/brownDog.html">
        <div class="card">
            <img src="../images/StuffedToys/HousePets/BrownDog.jpg" alt="BrownDog" style="width: 100%;">
            <h1>Brown Dog</h1>
            <p class="price">AED17.95</p>
            <p><button>Add to Cart</button></p>
        </div>
    </a>
</div>


<?php
//Output the footer
outputFooter();
?>