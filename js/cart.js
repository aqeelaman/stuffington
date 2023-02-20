"use strict";

//Globals
window.onload = loadCart;

//Get Cart from session storage or create one if it does not exist
function getCart(){
    let Cart;
    if(sessionStorage.Cart === undefined || sessionStorage.Cart === ""){
        Cart = [];
    }
    else {
        Cart = JSON.parse(sessionStorage.Cart);
    }
    return Cart;
}

//Displays Cart in page.
function loadCart(){
    let Cart = getCart();//Load or create Cart
    
    //Build string with Cart HTML
    let htmlStr = "<form action='checkout.php' method='post'>";
    let prodIDs = [];
    for(let i=0; i<Cart.length; ++i){
        htmlStr += "Product name: " + Cart[i].name + "<br>";
        prodIDs.push({id: Cart[i].id, count: 1});//Add to product array

        //check duplicate
        for(let i=0; i<prodIDs.length; i++){
            for(let j=i+1; j<prodIDs.length;j++){
                if(prodIDs[i].id==prodIDs[j].id){
                    prodIDs[i].count++;
                    prodIDs.splice(j,1);
                }
            }
        }
    }
    //console.log(prodIDs);
    //Add hidden field to form that contains stringified version of product ids.
    htmlStr += "<input type='hidden' name='prodIDs' value='" + JSON.stringify(prodIDs) + "'>";
    
    //Add checkout and empty Cart buttons
    htmlStr += "<input type='submit' value='Checkout'></form>";
    htmlStr += "<br><button onclick='emptyCart()'>Empty Cart</button>";
    
    //Display nubmer of products in Cart
    // document.getElementById("CartDiv").innerHTML = htmlStr;
}

//Adds an item to the Cart
function addToCart(prodID, prodName){
    let Cart = getCart();//Load or create Cart
    
    //Add product to Cart
    let count=1;
    Cart.push({id: prodID, name: prodName, qty: count});
    //check for duplicates
    for(let i=0; i<Cart.length; i++){
        for(let j=i+1; j<Cart.length; j++){
            if(Cart[i].id==Cart[j].id){
                //console.log("True");
                Cart[i].qty++;
                Cart.splice(j,1);
            }
        }
    }

    //Store in local storage
    sessionStorage.Cart = JSON.stringify(Cart);
    
    //Display Cart in page.
    //loadCart();      
}

//Deletes all products from Cart
function emptyCart(){
    sessionStorage.clear();
    loadCart();
}