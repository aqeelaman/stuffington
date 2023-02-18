export function apply() {

    var str = "";
    let categoryFilter1 = document.getElementById("teddyBear");
    let categoryFilter2 = document.getElementById("housePets");
    let categoryFilter3 = document.getElementById("mythical");

    if (categoryFilter1.checked == true) {
        str += 'category=Teddy Bear&';
    };
    if (categoryFilter2.checked == true) {
        str += 'category=House Pets&';
    };
    if (categoryFilter3.checked == true) {
        str += 'category=Mythical&';
    };

    let sizeFilter1 = document.getElementById("4inches");
    let sizeFilter2 = document.getElementById("8inches");
    let sizeFilter3 = document.getElementById("12inches");

    if (sizeFilter1.checked == true) {
        str += 'size=4&';
    };
    if (sizeFilter2.checked == true) {
        str += 'size=8&';
    };
    if (sizeFilter3.checked == true) {
        str += 'size=12&';
    };

    let priceFilter1 = document.getElementById("1-25");
    let priceFilter2 = document.getElementById("26-50");
    let priceFilter3 = document.getElementById("51-75");

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

    //  +min.toString() + "-" + max.toString();
    var url = str.slice(0,-1);
    console.log(url);
    return url;
}