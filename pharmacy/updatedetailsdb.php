<?php
    session_start();
?>
<html>
<head>
  <title>Update Details</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <style>
    .error {color: #FF0000;}
  </style>
  </head>
  <body>

  <h1><center>Update Details</center></h1>
  <br><br>
  <?php

    $passwd = $pwd = $contact_number = $pass = $confirm_pass = $address= '';
    $contact_numberErr = $passErr = $confirm_passErr = $addressErr = $pwdErr = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //address validation
    if (empty($_POST["address"])) {
      $address = "";
    } else {
      $address = test_input($_POST["address"]);
    }

    //contactnumber validation
    if (!empty($_POST["contact_number"])){
    if (preg_match("/^[1-9]{1}[0-9]{9}/", $_POST["contact_number"])) {
      $contact_number = test_input($_POST["contact_number"]);}
    else{
    $contact_numberErr = "<br>Invalid input. Enter contact number again.<br> ";
    }
    }
    else{
    $contact_number = "";
    }

    $pwd=$_POST['pwd'];
    if(!empty($_POST["pwd"])){

    if (strlen($_POST["pwd"]) < '8') {
      $pwdErr .= "<br>Your password must contain at least 8 Characters!"."<br>";
    }
    if(!preg_match("#[0-9]+#",$_POST["pwd"])) {
      $pwdErr .= "Your password must contain at least 1 Number!"."<br>";
    }
    if(!preg_match("#[A-Z]+#",$_POST["pwd"])) {
      $pwdErr .= "Your password must contain at least 1 Uppercase Letter!"."<br>";
    }
    if(!preg_match("#[a-z]+#",$_POST["pwd"])) {
      $pwdErr .= "Your password must contain at least 1 Lowercase Letter!"."<br>";
    }
    if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["pwd"])) {
      $pwdErr .= "Your password must contain at least 1 Special Character!"."<br><br>";
    }
    }
    else{
    $pwd="";
    }

    //pass validation
    $passwd=$_POST['confirm_pass'];
    if(!empty($_POST["pass"])){
    if ($_POST["pass"]!=$_POST["confirm_pass"]) {
      $confirm_passErr .=  "<br>Password and Confirm password do not match!"."<br>";
    }
    if (strlen($_POST["pass"]) < '8') {
      $passErr .= "<br>Your password must contain at least 8 Characters!"."<br>";
    }
    if(!preg_match("#[0-9]+#",$_POST["pass"])) {
      $passErr .= "Your password must contain at least 1 Number!"."<br>";
    }
    if(!preg_match("#[A-Z]+#",$_POST["pass"])) {
      $passErr .= "Your password must contain at least 1 Uppercase Letter!"."<br>";
    }
    if(!preg_match("#[a-z]+#",$_POST["pass"])) {
      $passErr .= "Your password must contain at least 1 Lowercase Letter!"."<br>";
    }
    if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["pass"])) {
      $passErr .= "Your password must contain at least 1 Special Character!"."<br>";
    }
    }else{
    $passErr="";
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
     }

      $temp_add=0;
      $temp_con=0;
      $temp_pass=0;

     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "";
     // Create connection
     $conn = mysqli_connect($servername, $username, $password,$dbname);

      if($pwdErr==''){
      if(!empty($address)){
        $check="SELECT password FROM login_data WHERE password='$pwd'";
        $sql = "UPDATE login_data SET address = '$address' where password = '$pwd'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Address updated successfully.')</script><br>";
            $temp_add=1;
        }
      }else{$temp_add=1;}

      if($contact_number!=""){
        $check="SELECT password FROM login_data WHERE password='$pwd'";
        $sql = "UPDATE login_data SET contact_no = '$contact_number' where password = '$pwd'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Contact number updated successfully.')</script><br>";
            $temp_con=1;
        }
      }else{$temp_con=1;}

      if($passwd!=""){
        $check="SELECT password FROM login_data WHERE password='$pwd'";
        $sql = "UPDATE login_data SET password = '$passwd' where password = '$pwd'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Password updated successfully.')</script><br>";
            $temp_pass=1;
        }
      }else{$temp_pass=1;}
    }

      if ($temp_add==1 && $temp_con==1 && $temp_pass==1) {
          mysqli_close($conn);
          //header('Location:http://localhost/miniproject/homepage/homepagefinal.php');
      }
      else {
          //header('Location:http://localhost/miniproject/exp7/updatedetailsdb.php');
          echo "<script>alert('Error updating record!')</script>" . mysqli_error($conn);
          mysqli_close($conn);
      }

  ?>
  <div class="mainbody">
  <form method="post" action=<?php echo $_SERVER['PHP_SELF'];?>>
    <div class="col-sm-6">

        <br><br>

        <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3" required><b>Contact Number(mobile):</b></div>
    <div class="col-sm-8"><input type="text" name="contact_number" id="contact_number" placeholder="Contact number">
    <span class="error"><?php echo $contact_numberErr;?></span></div>
    </div>

        <br><br>

        <div class="row">
        <div class="col-sm-1"></div>
      <div class="col-sm-3"><b>Address: </b></div>
      <div class="col-sm-8"><textarea name="address" rows="4" cols="35"></textarea>
      <span class="error"><?php echo $addressErr;?></span></div>
        </div>

      <br><br>

      <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-3" required><b>Current Password:</b></div>
  <div class="col-sm-8"><input type="password" name="pwd" id="password" placeholder="Password" required>
  <span class="error"> <?php echo $pwdErr;?></span></div>
  </div>

      <br><br>

        <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"><b>Set Password:</b></div>
    <div class="col-sm-8"><input type="pass" name="pass" id="pass" placeholder="Enter password">
    <span class="error"><?php echo $passErr;?></span></div>
    </div>

        <br><br>

        <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"><b>Confirm Password:</b></div>
    <div class="col-sm-8"><input type="pass" name="confirm_pass" id="confirm_pass" placeholder=" Enter password again">
    <span class="error"><?php echo $confirm_passErr;?></span></div>
      </div>

    <br><br>

    <div class="row">
        <div class="col-sm-3"></div>
        <input class="btn btn-success" type="submit" name=""><br><br><br>
        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;&nbsp;<b>Go to <a href="http://localhost/iwp_proj/homepagefinal.php">Homepage</a></b>
      </div>
        </div>

  </form>
</body>
</html>