<?php

//Ouputs the header for the page and opening body tag
function outputHeader($title)
{
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta charset="utf-8">';
    echo '<title>' . $title . ' | Stuffington</title>';
    echo '<!-- Link to favicon -->';
    echo '<link rel="icon" type="image/x-icon" href="../images/favicon.ico">';
    echo '<!-- Link to external style sheet -->';
    echo '<link rel="stylesheet" type="text/css" href="../css/navigation.css">';
    echo '</head>';
    echo '<body>';
}

function navigationBar()
{
    echo '<!-- Navigation section -->';
    echo '<div class="navigationContainer">';
    echo '<ul class="navbar">';
    echo '<li><a href="index.php"><img src="../images/Stuffed.png"></a></li>';
    echo '<li><input type="text" class="searchbar" placeholder="Search.."></li>';
    echo '<li style="float:right"><a href="cart.html" >🛒</a></li>';
    echo '<li style="float:right"><a href="profile.html">👤</a></li>';
    echo '<li style="float:right"><a href="login.html">SIGN IN</a></li>';
    echo '<li style="float:right"><a href="aboutUs.html">ABOUT US</a></li>';
    echo '</ul>';
    echo '<ul class="categoryNavbar"> ';
    echo '<li><a href="allproducts.html">All Products</a></li>';
    echo '<li><a href="teddybear.html">Teddy Bear</a></li>';
    echo '<li><a href="housepets.html">House Pets</a></li>';
    echo '<li><a href="mythical.html">Mythical</a></li>';
    echo '</ul>';
    echo '</div>';
}




//Outputs closing body tag and closing HTML tag
function outputFooter()
{
    echo '<!-- footer -->';
    echo '<footer>';
    echo '<p>©️ 2023 - STUFFINGTON - All Rights Reserved</p>';
    echo '<footer>';
    echo '</body>';
    echo '</html>';
}