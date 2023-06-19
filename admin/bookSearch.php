
<?php
$q = $_GET['q'];
$a = array();
$con = mysqli_connect('localhost','natnael','MK025399');
if (!$con) {
  die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($con,'library management');
$sql="SELECT * FROM books WHERE genre = '".$q."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
 array_push($a,$row['title']);
}
$h = $_GET["h"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($h !== "") {
  $h = strtolower($h);
  $len=strlen($h);
  foreach($a as $name) {
    if (stristr($h, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
 
}
echo $hint === "" ? "no suggestion" : $hint;
// Output "no suggestion" if no hint was found or output correct values

mysqli_close($con);
?>
                                                                                                 

