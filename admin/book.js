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
