function showDetails(itemId) {
  // Hide all item details
  var itemDetails = document.getElementsByClassName('item-details');
  for (var i = 0; i < itemDetails.length; i++) {
    itemDetails[i].classList.remove('show');
  }
  
  // Show the selected item detail
  var selectedItem = document.getElementById(itemId);
  selectedItem.classList.add('show');
}