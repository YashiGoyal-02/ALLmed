<?php
$conn = mysqli_connect("localhost","root","","bloodbank");

$table = "CREATE TABLE feedback(
    name varchar(45),
    email varchar(50) PRIMARY KEY,
    message varchar(150)
)";
if(mysqli_query($conn,$table)){
    echo "Table created";
}else{
    echo "Error";
}
mysqli_close($conn);
?>