
<?php

if (isset($_GET['q'])) {
  $q = $_GET['q'];
  
$con = mysqli_connect('localhost','natnael','MK025399');
if (!$con) {
  die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($con,'library management');
$sql="SELECT * FROM books WHERE genre = '".$q."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
  echo '
  <div class="book-item">
      <div class="img-container"><img class="book-img" src="Sapiens A Brief History of Humankind.jpg" alt="book image"></div><hr>
      <div class="book-details">
          <p class="book-title">Title:' . $row["title"] . '<span></span></p>
          <p class="book-author">Author <span>' . $row["author"] . '</span></p>
      </div>
      </div>
  '   ;
  
}

mysqli_close($con);
}
?>

