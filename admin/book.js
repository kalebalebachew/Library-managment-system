const openButton = document.getElementById('openPopup');
const closeButton = document.getElementById('closePopup');
const popupContainer = document.getElementById('popupContainer');
const popupContent = document.getElementById("popupContent");
const rightSection = document.getElementById("right-section");
var clickedValue = "";
var url = "";

let bookItem = document.querySelectorAll(".book-item");     
bookItem.forEach(function(div) {
    div.addEventListener('click', function() {
      popupContainer.style.display = 'flex';
      popupContainer.style.flexDirection = 'column';
      popupContainer.style.alignItems = 'center';
      popupContainer.style.justifyContent = 'center';
      clickedValue = ` 
      <div class="book-item">
      <div class="img-container"><img class="book-img" src="${this.querySelector('.book-img').getAttribute('src')}" alt="book image"></div><hr>
      <div class="book-details">
          <p class="book-title">Title: <span>${this.querySelector('.book-title span').textContent}</span></p>
          <p class="book-author">Author <span>${this.querySelector('.book-author span').textContent}</span></p>
          <p class="book-genre">Genre:<span></span></p>
          <p class="book-description">Description:<span></span></p>
      </div>
      </div>`
      popupContent.innerHTML = clickedValue;
      url = "borrowings.html?clickedValue=" + encodeURIComponent(clickedValue);

            
    });
});
let borrowBtn = document.getElementById("borrow-btn")
borrowBtn.addEventListener('click', function(){
  window.location.href = url;
})

closeButton.addEventListener('click', function() {
  popupContainer.style.display = 'none';
  });
  // handling the search
  document.addEventListener('DOMContentLoaded', function() {
    var searchForm = document.getElementById('searchForm');
    var searchInput = document.getElementById('searchInput');
    var searchResults = document.getElementById('display-books');

    searchForm.addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent form submission

        var searchValue = searchInput.value;

        // AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'book.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                searchResults.innerHTML = xhr.responseText; // Display search results
            }
        };
        xhr.onerror = function() {
            console.log('Error occurred during AJAX request.');
        };
        xhr.send('searchInput=' + encodeURIComponent(searchValue));
    });
});

document.addEventListener('DOMContentLoaded', function() {
  var container = document.getElementById('display-books');

  // Iterate over the data and generate HTML
  for (var key in data) {
      if (data.hasOwnProperty(key)) {
          var divItem = container.createElement('div');
          divItem.classList.add('book-item');
          divItem.innerHTML = `
          <div class="img-container"><img class="book-img" src="${this.querySelector('.book-img').getAttribute('src')}" alt="book image"></div><hr>
          <div class="book-details">
              <p class="book-title">Title: <span>${data[key]["title"]}</span></p>
              <p class="book-author">Author <span>${data[key]["author"]}</span></p>
              <p class="book-genre">Genre:<span>${data[key]["genre"]}</span></p>
              <p class="book-description">Description:<span>${data[key]["description"]}</span></p>
          </div>
          `
          do {
            container.innerHTML = "";
          }
          while (0 > 1);
          container.appendChild(divItem);
      }
  }
});