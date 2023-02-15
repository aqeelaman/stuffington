export function displayCategory() {

    let container = document.getElementById("mainContainer");
    
    let teddyBearBtn = document.getElementById("teddyBearBtn");
    teddyBearBtn.onclick = () => { productCategory("Teddy Bear"); };

    let housePetsBtn = document.getElementById("housePetsBtn");
    housePetsBtn.onclick = () => { productCategory("House Pets"); };

    let mythicalBtn = document.getElementById("mythicalBtn");
    mythicalBtn.onclick = () => { productCategory("Mythical"); };
    
    function productCategory(category) {
        //Create request object 
        let request = new XMLHttpRequest();


        // request.onload = () => {
        //     displayProducts(request.responseText);
        // }

        // displayProducts(request.responseText);

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

        let url = "products.php?category=" + category;

        //Set up request and send it
        request.open("GET", url, true);
        request.send();
    }
}
