<?php
session_start();
$userid=$_SESSION['email'];
$name=$_GET['name'];
$db = mysqli_connect('localhost','root','','products') or die('Error connecting to MySQL server.');
$row = "SELECT * FROM cart WHERE email_id='$userid' and product_name='$name'";
$result = mysqli_query($db,$row); //order executes
echo $name;

if (mysqli_num_rows($result) == 0){
echo "<br><br><br>";
echo 'Successful';
$order = "INSERT INTO cart (email_id,product_name) VALUES ('$userid','$name')";
$result = mysqli_query($db,$order); //order executes
mysqli_close($db);
}
else{
echo "<br><br><br>";
echo 'Product Already in cart!';
}



?>