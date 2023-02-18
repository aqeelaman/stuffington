export function search(){
    let searchBar = document.getElementById("searchbar");
    var searchUrl = 'allproducts.html?search=' + searchBar.value;
    console.log(searchUrl);
    window.location.href = searchUrl;
}