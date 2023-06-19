<?php

                        if (isset($_POST['searched-book'])) {
                          $searched = $_POST['searched-book'];
                        $con = mysqli_connect('localhost','natnael','MK025399');
                        if (!$con) {
                          die('Could not connect: ' . mysqli_connect_error());
                        }

                        mysqli_select_db($con,'library management');

                        $sql2 = "SELECT * FROM books WHERE title = '".$searched."'";
                        $result2 = mysqli_query($con,$sql2);
                        while($row = mysqli_fetch_array($result2)){
                          echo '<div class="book-item sea" style="display:none;">
                          <div class="img-container"><img class="book-img" src="Sapiens A Brief History of Humankind.jpg" alt="book image"></div><hr>
                                        <div class="book-details">
                                        <p class="book-title">Title:' . $row["title"] . '<span></span></p>
                                        <p class="book-author">Author <span>' . $row["author"] . '</span></p>
                                            <p class="book-genre">Genre:<span>'. $row["genre"] .'</span></p>
                                            <p class="book-description">Description:<span>'. $row["description"] .'</span></p>
                                        </div>
                                        </div>';
                        }
                        mysqli_close($con);
                        }
                        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>books</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="book.css">
</head>
<body>
    <header class="header">
        <nav class="nav-bar">
						<div class="logo">LMS</div>
            <h2>Library Management System</h2>
						<div class="profile-info">
              <div class="profile-name">
                <p class="person-name">Natnael Malike</p>
                <p class="person-field">Admin</p>
              </div>
              <div class="profile-cartoon"><img class ="cartoon" src="cartoon.jpg" alt="cartoon-picture" ></div>
            </div>
        </nav>
    </header>

    <main class="main-body">
			<aside class="menu-panel">
				<ul class="service-list">
					<li><a href="dashboard.html">Home</a></li>
					<li><a href="bookDashboard.php">Books</a></li>
					<li><a href="borrowings.html">My Borrowings</a></li>
					<li><a href="#">Account Settings</a></li>
					<li><a href="#">Logout</a></li>
			</ul>
			</aside>
			  <section class="right" id="content">
          <section class="welcome-message">
            <h2 class="user-welcome">Explore Books</h2>
                      <form action="bookDashBoard.php" method="post" class="search-form" id="searchForm">
                        
                        <div class="user-details">
                          <select name="book-catagory" id="catagory-list" onchange="showCatagoryBooks(this.value)">
                            <option value="">Choose a catagory</option>
                            <option class="catagory-option" value="Autobiography">Autobiography</option>
                            <option class="catagory-option" value="History">History</option>
                            <option class="catagory-option" value="Philosophy">Philosophy</option>
                            <option class="catagory-option" value="Religion">Religion</option>
                            <option class="catagory-option" value="Science and Technology">Science and Technology</option>
                            <option class="catagory-option" value="Self-Help">Self-help</option>  
                            </select>
                          <div class="input-box">
                            <input type="text" name="searched-book" placeholder="Search for a book . . . " required onkeyup="showHint(this.value)">
                            <div id="txtHint" class="textHint"></div>
                          </div>
                          <div class="button">
                            <input type="submit" value="search" id="search-button">
                          </div>
                        </div>
                      </form>
                      <div class="display-books" id="display-books">
                        <div class="book-item">
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
                    </div>
                  </div>
            </section>
            <div id="popupContainer">
              <div id="popupContent">
              
              </div>
              <button id="borrow-btn">Want to Borrow ?</button>
              <button id="closePopup">Close</button>
            </div>
        </section>              
        <footer>
          <p>&copy; 2023 Library Management System. All rights reserved.</p>
      </footer>
    
    <script src="book.js"></script>
</body>
</html>                                                                                                  
