<html>
<head>
<style>
.error {color: #FF0001;}
</style>
</head>
<body>

<?php

$fnameErr = $lnameErr = $emailErr = $stateErr = $cityErr = $addressErr = $pincodeErr = $mobilenoErr = $confirmErr = $bankErr = $creditnoErr = $cvvErr = $recotpErr = $otpErr = "";
$fname = $lname = $email = $state = $city = $address = $pincode = $mobileno = $confirm = $bank = $creditno = $cvv = $recotp = $otp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
         $fnameErr = "First Name is required";
    } else {
        $fname = input_data($_POST["fname"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
                $fnameErr = "Only alphabets and spaces are allowed";
            }
    }
    if (empty($_POST["lname"])) {
         $lnameErr = "Last Name is required";
    } else {
        $lname = input_data($_POST["lname"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
                $lnameErr = "Only alphabets and spaces are allowed";
            }
    }
    if (empty($_POST["email"])) {
            $emailErr = "Email is required";
    } else {
            $email = input_data($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid Email";
            }
     }
     if (empty ($_POST["state"])) {
             $stateErr = "State is required";
     } else {
             $state = input_data($_POST["state"]);
     }
     if (empty($_POST["city"])) {
          $cityErr = "City is required";
     } else {
         $city = input_data($_POST["city"]);
             if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
                 $cityErr = "Only alphabets and spaces are allowed";
             }
     }
     if (empty($_POST["address"])) {
          $addressErr = "Address is required";
     } else {
         $address = input_data($_POST["address"]);
             if (!preg_match("/^[a-zA-Z ]*$/",$address)) {
                 $addressErr = "Only alphabets and spaces are allowed";
             }
     }
     if (empty($_POST["pincode"])) {
             $pincodeErr = "Pincode is required";
     } else {
              $pincode = input_data($_POST["pincode"]);
              if (strlen ($pincode) != 6) {
              $pincodeErr = "Pincode must contain exactly 6 digits.";
              }
              if (!preg_match ("/^[0-9]*$/", $pincode) ) {
                   $pincodeErr = "Invalid input. Only numeric value is allowed.";
              }
     }
    if (empty($_POST["mobileno"])) {
            $mobilenoErr = "Mobile no is required";
    } else {
             $mobileno = input_data($_POST["mobileno"]);
             if (strlen ($mobileno) != 10) {
             $mobilenoErr = "Mobile no. must contain exactly 10 digits.";
             }
             if (!preg_match ("/^[0-9]*$/", $mobileno) ) {
                  $mobilenoErr = "Invalid input. Only numeric value is allowed.";
             }
    }
    if (!isset($_POST['confirm'])){
            $confirmErr = "You need to confirm to proceed.";
    } else {
            $confirm = input_data($_POST["confirm"]);
    }
    if (empty ($_POST["bank"])) {
            $bankErr = "Bank is required";
    } else {
            $bank = input_data($_POST["bank"]);
    }
    if (empty($_POST["creditno"])) {
            $creditnoErr = "Credit/Debit No. is required";
    } else {
             $creditno = input_data($_POST["creditno"]);
             if (strlen ($creditno) != 16) {
             $creditnoErr = "Credit no. must contain exactly 16 digits.";
             }
             if (!preg_match ("/^[0-9]*$/", $creditno) ) {
                  $creditnoErr = "Invalid input. Only numeric value is allowed.";
             }
    }
    if (empty($_POST["cvv"])) {
            $cvvErr = "CVV is required";
    } else {
             $cvv = input_data($_POST["cvv"]);
             if (strlen ($cvv) != 3) {
             $cvvErr = "CVV must contain exactly 3 digits.";
             }
             if (!preg_match ("/^[0-9]*$/", $cvv) ) {
                  $cvvErr = "Invalid input. Only numeric value is allowed.";
             }
    }
    if (empty ($_POST["recotp"])) {
            $recotpErr = "Input is required";
    } else {
            $recotp = input_data($_POST["recotp"]);
    }
    if (empty($_POST["otp"])) {
            $otpErr = "OTP is required";
    } else {
             $otp = input_data($_POST["otp"]);
             if (strlen ($otp) != 6) {
             $otpErr = "OTP must contain exactly 6 digits.";
             }
             if (!preg_match ("/^[0-9]*$/", $otp) ) {
                  $otpErr = "Invalid input. Only numeric value is allowed.";
             }
    }
    if (!isset($_POST['confirm'])){
            $confirmErr = "You need to confirm to proceed.";
    } else {
            $confirm = input_data($_POST["confirm"]);
    }
}
function input_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Checkout Page</h2>
<span class = "error">* Required field </span>
<br><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
  <b>PERSONAL DETAILS</b><br><br>
    Enter your First Name:
    <input type="text" name="fname" size="20">
    <span class="error">* <?php echo $fnameErr; ?> </span>
    <br><br>
    Enter your Last Name:
    <input type="text" name="lname" size="20">
    <span class="error">* <?php echo $lnameErr; ?> </span>
    <br><br>
    Enter your Email:
    <input type="text" name="email" size="30">
    <span class="error">* <?php echo $emailErr; ?> </span>
    <br><br>
    Enter your Mobile No:
    <input type="text" name="mobileno" size="15">
    <span class="error">* <?php echo $mobilenoErr; ?> </span>
    <br><br>
   <b>ADDRESS DETAILS</b><br><br>
    Select your State or Union Territory: &ensp;
    <select name="state" id="state">
    <option value="Andhra Pradesh">Andhra Pradesh</option>
    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
    <option value="Assam">Assam</option>
    <option value="Bihar">Bihar</option>
    <option value="Chandigarh">Chandigarh</option>
    <option value="Chhattisgarh">Chhattisgarh</option>
    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
    <option value="Daman and Diu">Daman and Diu</option>
    <option value="Delhi">Delhi</option>
    <option value="Lakshadweep">Lakshadweep</option>
    <option value="Puducherry">Puducherry</option>
    <option value="Goa">Goa</option>
    <option value="Gujarat">Gujarat</option>
    <option value="Haryana">Haryana</option>
    <option value="Himachal Pradesh">Himachal Pradesh</option>
    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
    <option value="Jharkhand">Jharkhand</option>
    <option value="Karnataka">Karnataka</option>
    <option value="Kerala">Kerala</option>
    <option value="Madhya Pradesh">Madhya Pradesh</option>
    <option value="Maharashtra">Maharashtra</option>
    <option value="Manipur">Manipur</option>
    <option value="Meghalaya">Meghalaya</option>
    <option value="Mizoram">Mizoram</option>
    <option value="Nagaland">Nagaland</option>
    <option value="Odisha">Odisha</option>
    <option value="Punjab">Punjab</option>
    <option value="Rajasthan">Rajasthan</option>
    <option value="Sikkim">Sikkim</option>
    <option value="Tamil Nadu">Tamil Nadu</option>
    <option value="Telangana">Telangana</option>
    <option value="Tripura">Tripura</option>
    <option value="Uttar Pradesh">Uttar Pradesh</option>
    <option value="Uttarakhand">Uttarakhand</option>
    <option value="West Bengal">West Bengal</option>
    </select>
    <span class="error">* <?php echo $stateErr; ?> </span></br></br>
    Enter your City:
    <input type="text" name="city">
    <span class="error">* <?php echo $cityErr; ?> </span>
    <br><br>
    Enter your local delivery address:
    <input type="text" name="address" size="40">
    <span class="error">* <?php echo $addressErr; ?> </span>
    <br><br>
    Enter your Pincode:
    <input type="text" name="pincode" size="10">
    <span class="error">* <?php echo $pincodeErr; ?> </span>
    <br><br>
    Confirm details and proceed to payment
    <input type="checkbox" name="confirm">
    <span class="error">* <?php echo $confirmErr; ?> </span>
    <br><br>
   <b>PAYMENT DETAILS</b><br><br>
    Select the bank of your preference:
    <select name="bank" id="bank">
    <option value="HDFC Bank">HDFC Bank</option>
    <option value="ICICI Bank">ICICI Bank</option>
    <option value="AXIS Bank">AXIS Bank</option>
    <option value="State Bank of India">State Bank of India</option>
    <option value="Bank of Baroda">Bank of Baroda</option>
    <option value="Oriental Bank">Oriental Bank</option>
    <option value="Bank of Maharashtra">Bank of Maharashtra</option>
    <option value="Union Bank of India">Union Bank of India</option>
    <option value="Punjab National Bank">Punjab National Bank</option>
    </select>
    <span class="error">* <?php echo $bankErr; ?> </span>
    <br><br>
    Enter your Credit/Debit Card No:
    <input type="text" name="creditno">
    <span class="error">* <?php echo $creditnoErr; ?> </span>
    <br><br>
    Enter your CVV:
    <input type="password" name="cvv" size="5">
    <span class="error">* <?php echo $cvvErr; ?> </span>
    <br><br>
    Where would you like to receive the OTP?
    <input type="radio" name="recotp" value="email"> E-mail
    <input type="radio" name="recotp" value="mobileno"> Mobile No
    <span class="error">* <?php echo $recotpErr; ?> </span>
    <br><br>
    Enter the OTP:
    <input type="text" name="otp" size="10">
    <span class="error">* <?php echo $otpErr; ?> </span>
    <br><br>
    Confirm order
    <input type="checkbox" name="confirm">
    <span class="error">* <?php echo $confirmErr; ?> </span>
    <br><br><br>
    <input type="submit" name="submit" value="Submit">
    <br><br>
</form>

<?php
    if(isset($_POST['submit'])) {
    if($fnameErr == "" && $lnameErr == "" && $emailErr == "" && $stateErr == "" && $cityErr == "" && $addressErr == "" && $pincodeErr == "" && $mobilenoErr == "" && $confirmErr == "" && $bankErr == ""
    && $creditnoErr == "" && $cvvErr == "" && $recotpErr == "" && $otpErr == "" )
    {
        echo "<b><br><br>PERSONAL DETAILS</b><br><br>";
        echo "First Name: " .$fname;
        echo "<br>";
        echo "Last Name: " .$lname;
        echo "<br>";
        echo "Email: " .$email;
        echo "<br>";
        echo "Mobile No: " .$mobileno;
        echo "<br><br>";
        echo "<b>ADDRESS DETAILS</b><br><br>";
        echo "State: " .$state;
        echo "<br>";
        echo "City: " .$city;
        echo "<br>";
        echo "Address: " .$address;
        echo "<br>";
        echo "Pincode: " .$pincode;
        echo "<br><br>";
        echo "<b>PAYMENT DETAILS</b><br><br>";
        echo "Bank: " .$bank;
        echo "<br>";
        echo "Credit Card No: " .$creditno;
        echo "<br><br>";
        echo "<b>Thankyou for shopping with us!</b>";
    }
  }
?>

</body>
</html>