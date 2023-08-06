
<?php

$del = $_POST['delete'];
$conn = mysqli_connect("localhost","root","","bloodbank");
$query = "delete from blooddonar where phone='$del'";
$res = mysqli_query($conn,$query);
include 'admindelete.php';
?>