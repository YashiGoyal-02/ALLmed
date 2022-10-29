<?php
   session_start();
   unset($_SESSION["email"]);
   unset($_SESSION["password"]);
   session_destroy();

   echo 'You have destroyed the session';
?>
<html>
<body>
		<br><br>Click here to go back to the <a href = "login.php">Login Page.
</body>
</html>