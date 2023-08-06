


<!DOCTYPE HTML>
<html>

<head>
    <title>FEEDBACK</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="Aboutus.css">
        <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Miriam+Libre:wght@700&display=swap" rel="stylesheet">
        <style>
            h1{
                color: aliceblue;
            }
            </style>
</head>

<body>
<?php  
 
$insert = false;
$name=$email=$message=$nameErr=$emailb="";

// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "bloodbank";


// Create a connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
  // Sql query to be executed
  $sql = "INSERT INTO `feedback` (`name`, `email`,`messege`) VALUES ('$name', '$email','$message')";
  $result = mysqli_query($conn, $sql);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@vitstudent.ac.in$/",$email)){
      $nameErr = "Wrong Email Format";
    }
    $message = test_input($_POST["message"]);
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="landingpage.html"><i class="fas fa-heartbeat"></i> BloodBank</a>
          </div>
        <div class="container">
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="Aboutus.html">AboutUs <i class="fas fa-address-card"></i></a></li>
                <li><a href="Contactus.html">ContactUs<i class="fas fa-phone"></i></a></li>
                <li><a href="bloodsearch.html">BloodSearch <i class="fas fa-search-plus"></i></a></li>
                <li><a href="stock.php">StockDetails <i class="fas fa-box-open"></i></a></li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
              <li><a href="Beadonar.php">Be a donor  <i class="fas fa-hand-holding-medical"></i></a></li>
              <li><a href="admin.html">Administrator   <i class="fas fa-user-lock"></i></a></li>
              <li><a href="feedback.php">feedbackform   <i class="fas fa-user-lock"></i></a></li>
            </ul>
          </div>
        </div>
        </div>
      </nav>
      <div class="container spl">
    <form action="" method="POST" name="myform" >
      <div class="form-group">
        <i class="fas fa-user-tie"></i>
        <label for="name">Name</label>
        <div><input class="form-control" type="text" placeholder="Enter Your Name" name="name" required>
        </div>
      </div>
      <div class="form-group">
        <i class="fas fa-key"></i>
        <label for="email">Email</label>
        <div><input class="form-control" type="email"  placeholder="Enter your Email" name="email">
        <span class="error"><?php $nameErr?></span>
    </div>
      </div>
      <div class="form-group">
        <i class="fas fa-key"></i>
        <label for="message">Message</label>
        <div><input class="form-control" type="textarea"  placeholder="Type Your Feedback" name="message"></div>
      </div>

      

      <button type="submit" class="btn btn-default btn-sm pos" >SUBMIT</button>
    </form>
  </div>
  
</body>
</html>