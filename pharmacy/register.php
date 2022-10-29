<!DOCTYPE html>
<html>
<head>
  <title>Register</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <style>
    .error {color: #FF0000;}
  </style>
</head>
<body>
  <?php

  $first_nameErr = $last_nameErr = $email_idErr = $contact_number = $gender = $password = $confirm_password = $address= '';
  $first_name = $last_name = $email_id = $contact_numberErr = $genderErr = $passwordErr = $confirm_passwordErr = $addressErr = '';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //first name validation
    if (empty($_POST["first_name"])) {
      $first_nameErr = "First Name is required";
    }
    else {
  $first_name = test_input($_POST["first_name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name) || str_word_count($first_name)>1) {
      $first_nameErr = "Enter a valid First Name";
      $first_name = "";
    }
  }

  //last name validation
  if (empty($_POST["last_name"])) {
    $last_nameErr = "Last Name is required";
  } else {
  $last_name = test_input($_POST["last_name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name) || str_word_count($last_name)>1) {
      $last_nameErr = "Enter a valid Last Name";
      $last_name = "";
    }
  }


  //email validation
  if (empty($_POST["email_id"])) {
    $email_idErr = "Email is required";
  } else {
    $email_id = test_input($_POST["email_id"]);
    if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
      $email_idErr = "Invalid email format";
      $email_id = "";
    }
  }

  //contactnumber validation
  if (preg_match("/^[1-9]{1}[0-9]{9}$/", $_POST["contact_number"])) {
    $contact_number = test_input($_POST["contact_number"]);
  } elseif (empty($_POST["contact_number"])) {
    $contact_numberErr = "Contact information required";
  } else {
    $contact_numberErr = "Enter a valid phone number";
  }

  //address validation
  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }

  //gender validation
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
    $genderErr='';
  }

  //password validation
  if(!empty($_POST["password"])){
  if ($_POST["password"]!=$_POST["confirm_password"]) {
    $confirm_passwordErr .=  "Passowrd and Confirm Password does not match!"."<br>";
  }
  if (strlen($_POST["password"]) < '8') {
    $passwordErr .= "Your Password Must Contain At Least 8 Characters!"."<br>";
  }
  elseif(!preg_match("#[0-9]+#",$_POST["password"])) {
    $passwordErr .= "Your Password Must Contain At Least 1 Number!"."<br>";
  }
  elseif(!preg_match("#[A-Z]+#",$_POST["password"])) {
    $passwordErr .= "Your Password Must Contain At Least 1 Uppercase Letter!"."<br>";
  }
  elseif(!preg_match("#[a-z]+#",$_POST["password"])) {
    $passwordErr .= "Your Password Must Contain At Least 1 Lowercase Letter!"."<br>";
  }
  elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"])) {
    $passwordErr .= "Your Password Must Contain At Least 1 Special Character!"."<br>";
  }
  }else{
  $passwordErr .= "Please Enter your password"."<br>";
  }
}
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
     }

     setcookie("Email-id", $email_id, time() + 60, "/");


  ?>




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if($first_nameErr =='' && $last_nameErr =='' && $email_idErr == '' && $contact_numberErr =='' && $genderErr =='' && $passwordErr =='' && $confirm_password=='' && $addressErr == ''){
  $db = mysqli_connect('localhost','root','','products') or
die('Error connecting to MySQL server.');
$password=test_input($_POST["password"]);
$order = "INSERT INTO login_data
      (first_name, last_name, email_id, contact_no, gender, address, password)
      VALUES
      ('$first_name', '$last_name', '$email_id', '$contact_number', '$gender', '$address', '$password')";
       $result = mysqli_query($db,$order); //order executes
  mysqli_close($db);
  header("location:http://localhost/iwp_proj/login.php");
}


}
?>
  <h1><center>Register</center></h1>
  <br><br>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="col-sm-7">
    <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-3" required><b>First Name:</b></div>
        <div class="col-sm-8"><input type="text" name="first_name" id="first_name" placeholder="First name">
        <span class="error">* <?php echo $first_nameErr;?></span></div>
      </div>

        <br><br>

        <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"><b>Last Name:</b></div>
    <div class="col-sm-8"><input type="text" name="last_name" id="last_name" placeholder="Last name ">
    <span class="error">* <?php echo $last_nameErr;?></span></div>
      </div>

    <br><br>

    <div class="row">
        <div class="col-sm-1"></div>
    <div class="col-sm-3" required><b>Email-id:</b></div>
    <div class="col-sm-8"><input type="text" name="email_id" id="email_id" placeholder="Email id">
    <span class="error"> * <?php echo $email_idErr;?></span></div>
    </div>

        <br><br>

        <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3" required><b>Contact Number(mobile):</b></div>
    <div class="col-sm-8"><input type="text" name="contact_number" id="contact_number" placeholder="Contact number">
    <span class="error"> *<?php echo $contact_numberErr;?></span></div>
    </div>

    <br><br>

    <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-3"><b>Gender:</b></div>
        <div class="col-sm-8">
        <input type="radio" name="gender" id="gender" value="male"> Male
        <input type="radio" name="gender" id="gender" value="female"> Female
    <input type="radio" name="gender" id="gender" value="other"> Other
    <span class="error"> * <?php echo $genderErr;?></span>
        </div></div>

        <br><br>

        <div class="row">
        <div class="col-sm-1"></div>
      <div class="col-sm-3"><b>Address: </b></div>
      <div class="col-sm-8"><textarea name="address" rows="4" cols="35"></textarea>
      <span class="error">* <?php echo $addressErr;?></span></div>
        </div>

      <br><br>

        <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"><b>Set Password:</b></div>
    <div class="col-sm-8"><input type="password" name="password" id="password" placeholder="Password">
    <span class="error">* <?php echo $passwordErr;?></span></div>
    </div>

        <br><br>

        <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3"><b>Confirm Password:</b></div>
    <div class="col-sm-8"><input type="password" name="confirm_password" id="confirm_password" placeholder=" Enter password again">
    <span class="error">* <?php echo $confirm_passwordErr;?></span></div>
      </div>

    <br><br>

        <div class="row">
        <div class="col-sm-3"></div>
        <input class="btn btn-success" type="submit" value="Register">

        </div>
  </form>




</body>
</html>