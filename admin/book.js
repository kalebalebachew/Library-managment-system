const openButton = document.getElementById('openPopup');
const closeButton = document.getElementById('closePopup');
const popupContainer = document.getElementById('popupContainer');
const popupContent = document.getElementById("popupContent");
const rightSection = document.getElementById("right-section");
var clickedValue = "";
var url = "";
let str2;

toBorrow()
let borrowBtn = document.getElementById("borrow-btn")
borrowBtn.addEventListener('click', function(){
  window.location.href = url;
})

closeButton.addEventListener('click', function() {
  popupContainer.style.display = 'none';
  });
  // handling the search
  function showCatagoryBooks(str) {
     str2 = str;
    if (str == "") {
      document.getElementById("display-books").innerHTML = `<div class="book-item">
                          <div class="img-container"><img class="book-img" src="Sapiens A Brief History of Humankind.jpg" alt="book image"></div><hr>
                          <div class="book-details">
                            <p class="book-title">Title: <span>The Hobbit</span></p>
                            <p class="book-author">Author: <span>J.R.R. Tolkien</span></p>
                          </div>
                       </div>
                       <div class="book-item">
                        <div class="img-container"><img class="book-img" src="The Gene An Intimate History.jpg" alt="book image"></div><hr>
                        <div class="book-details">
                          <p class="book-title">Title: <span>KAleb</span></p>
                          <p class="book-author">Author: <span>J.R.R. Tolkien</span></p>
                        </div>
                     </div>
                     <div class="book-item">
                      <div class="img-container"><img class="book-img" src="cartoon.jpg" alt="book image"></div><hr>
                      <div class="book-details">
                        <p class="book-title">Title: <span>Malike</span></p>
                        <p class="book-author">Author: <span>J.R.R. Tolkien</span></p>
                          </div>
                      </div>
                      <div class="book-item">
                        <div class="img-container"><img class="book-img" src="cartoon.jpg" alt="book image"></div><hr>
                        <div class="book-details">
                          <p class="book-title">Title: <span>Natnael</span></p>
                          <p class="book-author">Author: <span>J.R.R. Tolkien</span></p>
                        </div>
                    </div>`;
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("display-books").innerHTML = this.responseText;
          toBorrow()
          }
        }
      };
      xmlhttp.open("GET","book.php?q="+str,true);
      xmlhttp.send();
    }
  
 function toBorrow() {
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
 }

 function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "bookSearch.php?h=" + str + '&q=' + str2, true);
    xmlhttp.send();
  }
} 