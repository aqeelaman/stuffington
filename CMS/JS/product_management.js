$('#add-product').submit(function(event) {
  event.preventDefault();
  
  var name = $('input[name="name"]').val();
  var price = $('input[name="price"]').val();
  var description = $('input[name="description"]').val();
  
  $.ajax({
    url: '/api/product_management.php',
    method: 'POST',
    data: {
        productID: ID,
        Image: Image,
        Name: name,
        Price: 00,
        Category: category,
        Size: size,
        Colour: colour,
        Stock: 00
      },
    
    success: function(data) {
      console.log(data);
    },
    error: function(xhr, status, error) {
      console.log('Error: ' + error);
    }
  });
});
