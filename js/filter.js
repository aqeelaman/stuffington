//function for apply button in all products
export function apply() {

    //string to be returned
    var str = "";

    //defining category filters
    let categoryFilter1 = document.getElementById("teddyBear");
    let categoryFilter2 = document.getElementById("housePets");
    let categoryFilter3 = document.getElementById("mythical");

    //checking if category filters are checked 
    if (categoryFilter1.checked == true) {
        str += 'category=Teddy Bear&';
    };
    if (categoryFilter2.checked == true) {
        str += 'category=House Pets&';
    };
    if (categoryFilter3.checked == true) {
        str += 'category=Mythical&';
    };

    //defining size filters
    let sizeFilter1 = document.getElementById("4inches");
    let sizeFilter2 = document.getElementById("8inches");
    let sizeFilter3 = document.getElementById("12inches");

    //checking if size filters are checked 
    if (sizeFilter1.checked == true) {
        str += 'size=4&';
    };
    if (sizeFilter2.checked == true) {
        str += 'size=8&';
    };
    if (sizeFilter3.checked == true) {
        str += 'size=12&';
    };

    //defining price filters
    let priceFilter1 = document.getElementById("1-25");
    let priceFilter2 = document.getElementById("26-50");
    let priceFilter3 = document.getElementById("51-75");

    //checking if price filters are checked 
    var min = 1;
    var max = 0;
    if (priceFilter1.checked == true) {
        str += 'min=1&max=25&';
    };
    if (priceFilter2.checked == true) {
        str += 'min=26&max=50&';
    };
    if (priceFilter3.checked == true) {
        str += 'min=51&max=75&';
    };

    var url = str.slice(0,-1);//removing & from end
    return url; // return string
}