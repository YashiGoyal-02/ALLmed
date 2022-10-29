<?php
   session_start();
   unset($_SESSION["email"]);
   unset($_SESSION["password"]);
   session_destroy();
?>
<?php
// define variables to empty values
$emailErr = $passerr = "";
$email = $password =  "";

//Input fields validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Email Validation
    if (empty($_POST["email"])) {
            $emailErr = "Required";
    } else {
            $email = input_data($_POST["email"]);
            $emailErr="";
     }

     if(empty($_POST["password"])){
     $passerr = "Required";
  	}
  	else{
  		$password=input_data($_POST["password"]);
      $passerr = "";
  	}
}
function input_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<html>
<body>
<head>
	  <link rel="stylesheet" href="logincss.css">
</head>
		<font face="Calibri">
			<div class="mainbody">
			<div align="center">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="border: 3px solid black; width: 400px; box-shadow: 10px 15px #D5DBD7;">
				<h1>LOGIN</h1>
				<h2>Enter your Login Credentials</h2><br>
				<div class="container">
					Email ID: <br><input name="email" type="text" placeholder="Email"><br><br>
					Password: <br><input name="password" type="password" placeholder="Password"><br><br>
					<?php
              if(isset($_POST['submit'])) {
                if($emailErr != '' or $passerr != '') {
                	echo '<span style="color:red;">*Both fields required</span><br><br>';

                  }
                else{
                	if($emailErr == '' && $passerr == ''){

                    $db = mysqli_connect('localhost','root','','products') or
                    die('Error connecting to MySQL server.');

                    $row = "SELECT * FROM login_data WHERE email_id= '$email'";
                    $result = mysqli_query($db,$row); //order executes

                    if (mysqli_num_rows($result) == 0){
                      echo '<span style="color:red;">No such user found!</span><br><br>';
                      mysqli_close($db);
                      header("location:http://localhost/iwp_proj/register.php"); //signup page ridirection
                      }
                      else{
                        $row1 = mysqli_fetch_array($result);
                        if($row1['password'] == $password){
                        mysqli_close($db);
                      //
                      header("location:http://localhost/iwp_proj/homepagefinal.php");
                        session_start();
                        $_SESSION["email"] = $_POST["email"];
                        if(isset($_POST["remember"]))
                        {
                            $_SESSION["email"] = $_POST["email"];
                            header("location:http://localhost/iwp_proj/homepagefinal.php");
                        }



                       }
                       else{
                          mysqli_close($db);
                          echo '<span style="color:red;">Invalid Password! Try Again</span><br><br>';
                        	}

              			}
                  }
                  }
                  }

            ?>
				  <input type="checkbox" name="remember" /> Remember me<br><br><br>

			    <button type="submit" name="submit">Login</button><br>
			</div>
      New customer? <a href= "../iwp_proj/register.php">Register here.
      <br><br>
			</form></div></div>
		</font>
</body>
</html>