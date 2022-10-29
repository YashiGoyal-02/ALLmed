<?php
session_start();
$userid=$_SESSION['email'];
$db = mysqli_connect('localhost','root','','products') or die('Error connecting to MySQL server.');
$sql = "SELECT product_name FROM cart WHERE email_id='$userid'";
$result = mysqli_query($db, $sql); // First parameter is just return of "mysqli_connect()" function
echo "<br>";
echo "<table border='1'>";
while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    echo "<tr>";
    foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
        echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
    }
    echo "</tr>";
}
echo "</table>";
?>
