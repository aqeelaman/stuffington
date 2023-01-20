<?php

//Ouputs the header for the page and opening body tag
function outputHeader($title){
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<title>' . $title . ' | GREEN MARKET</title>';
    echo '<!-- Link to external style sheet -->';
    echo '<link rel="stylesheet" type="text/css" href="../css/navigation.css">';
    echo '</head>';
    echo '<body>';
}

/* Ouputs the banner and the navigation bar
    The selected class is applied to the page that matches the page name variable */
function outputBannerNavigation($pageName){
    //Output banner and first part of navigation
    echo '<!-- Navigation section -->';
    echo '<ul class="navbar">';
    
    //Array of pages to link to
    $linkNames = array("HOME", "Search", "CART", "REGISTRATION", "LOGIN");
    $linkAddresses = array("index.php", "","cart.php", "registration.php", "login.php");
    
    //Output navigation
    for($x = 0; $x < count($linkNames); $x++){

        echo '<li ';
        //Inline css for registration and login to float right
        if($linkNames[$x] =="REGISTRATION" || $linkNames[$x] =="LOGIN" || $linkNames[$x] =="CART" ){
            echo ' style="float:right" ';
        }
        echo '>';
        if ($linkNames[$x] =="Search"){
            echo '<input type="text" class="searchbar" placeholder="Search..">';
        }
        else{
            echo '<a ';
            //Selected class
            if($linkNames[$x] == $pageName){
                echo 'class="selected" ';
            }
            echo 'href="' . $linkAddresses[$x] . '">';
            
            if ($linkNames[$x] =="HOME"){
                echo '<img src="../images/greenLogo.png">';
            }
            elseif($linkNames[$x] =="CART"){
                echo '🛒';
            }
            else{
                echo $linkNames[$x];
            }
            echo'</a>';
        }
        echo '</li>';
    }
    echo '</ul>';
}

//Outputs closing body tag and closing HTML tag
function outputFooter(){
    echo '<p>Footer<p>';
    echo '</body>';
    echo '</html>';
}
