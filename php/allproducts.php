<?php
//Include the PHP functions to be used on the page 
include('common.php');

//Output header and navigation 
outputHeader("All Products");
navigationBar();
?>

<!-- Contents of the page -->
<h1 class="heading">ALL STUFFED TOYS</h1>

<!-- div for the contents of the page -->
<div class="categoryDisplayContainer">
    <!-- div for the filter bar on the left side -->
    <div class="sidebar">
        <h1>Filter By</h1>
        <p>Category:</p>
        <label><input type="checkbox" id="teddyBear">Teddy Bear</label>
        <label><input type="checkbox" id="housePets">House Pets</label>
        <label><input type="checkbox" id="mythical">Mythical</label>
        <br>
        <br>

        <p>Sizes:</p>
        <label><input type="checkbox" id="4inches">04 Inches</label>
        <label><input type="checkbox" id="8inches">08 Inches</label>
        <label><input type="checkbox" id="12inches">12 Inches</label>
        <br>
        <br>

        <p>Colour:</p>
        <label><input type="checkbox" id="brown">Brown</label>
        <label><input type="checkbox" id="blue">Blue</label>
        <label><input type="checkbox" id="white">White</label>
        <br>
        <br>

        <p>Price:</p>
        <label><input type="checkbox" id="1-25"> 01 - 25 AED</label>
        <label><input type="checkbox" id="26-50"> 26 - 50 AED</label>
        <label><input type="checkbox" id="51-75"> 51 - 75 AED</label>
        <br>
        <br>
    </div>


    <!-- div for the main contents of the page which displays all the products -->
    <div id="mainContainer" class="mainContainer">
        
    </div>
</div>

<script type="module">
    "use strict";

    // import {displayCategory} from "../js/productCategory.js";

    let container = document.getElementById("mainContainer");
    // let teddyBearBtn = document.getElementById("teddyBearBtn");
    // teddyBearBtn.onclick = () => { productCategory("Teddy Bear"); };

    // let housePetsBtn = document.getElementById("housePetsBtn");
    // housePetsBtn.onclick = () => { productCategory("House Pets"); };

    // let mythicalBtn = document.getElementById("mythicalBtn");
    // mythicalBtn.onclick = () => { productCategory("Mythical"); };

    window.onload = init;

    //Downloads JSON description of products from server
    function init() {
        // displayCategory();
        //Create request object 
        let request = new XMLHttpRequest();

        //Create event handler that specifies what should happen when server responds
        request.onload = () => {
            //Check HTTP status code
            if (request.status === 200) {
                //Add data from server to page
                displayProducts(request.responseText);
            }
            else
                alert("Error communicating with server: " + request.status);
        };


        //Set up request and send it
        request.open("GET", "products.php");
        request.send();


    }

    // function productCategory(category) {
    //     //Create request object 
    //     let request = new XMLHttpRequest();


    //     request.onload = () => {
    //         displayProducts(request.responseText);
    //     }

    //     // displayProducts(request.responseText);

    //     // //Create event handler that specifies what should happen when server responds
    //     // request.onload = () => {
    //     //     //Check HTTP status code
    //     //     if (request.status === 200) {
    //     //         //Add data from server to page
    //     //         displayProducts(request.responseText);
    //     //     }
    //     //     else
    //     //         alert("Error communicating with server: " + request.status);
    //     // };

    //     let url = "products.php?category=" + category;

    //     //Set up request and send it
    //     request.open("GET", url, true);
    //     request.send();
    // }

    //Loads products into page
    function displayProducts(jsonProducts) {

        //Convert JSON to array of product objects
        let prodArray = JSON.parse(jsonProducts);
        console.log(prodArray);
        let htmlStr = "";

        //Create HTML table containing product data
        for (let i = 0; i < prodArray.length; i++) {

            htmlStr += '<div class="card">';
            htmlStr += '<a href="' + prodArray[i].linkPage + '">';
            htmlStr += '<img src="' + prodArray[i].image_url + '" alt="' + prodArray[i].name + '" style="width: 100%;">';
            htmlStr += '<h1>' + prodArray[i].name + '</h1>';
            htmlStr += '<p class="price">AED' + prodArray[i].price + '</p></a>';
            htmlStr += '<p><button>Add to Cart</button></p></div>';
        }

        container.innerHTML = htmlStr;
    }

</script>







<?php
//Output the footer
outputFooter();
?>