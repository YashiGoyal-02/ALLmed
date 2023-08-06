<!DOCTYPE html>
<html>
    <head>
        <title>BE A Donar</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="Beadonar.css">
        <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Miriam+Libre:wght@700&display=swap" rel="stylesheet">
        
        <style>
            .error{
              margin-left: 10px;
              color: red;
            }
        </style>
    </head>
    <body>
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
                    <li><a href="Contactus.html">ContactUs <i class="fas fa-phone"></i></a></li>
                    <li><a href="bloodsearch.html">BloodSearch <i class="fas fa-search-plus"></i></a></li>
                    <li><a href="stock.php">StockDetails <i class="fas fa-box-open"></i></a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="Beadonar.php">Be a donor  <i class="fas fa-hand-holding-medical"></i></a></li>
                  <li><a href="admin.html">Administrator   <i class="fas fa-user-lock"></i></a></li>
                  <li><a href="feedback.html">feedbackform   <i class="fas fa-user-lock"></i></a></li>
                </ul>
              </div>
            </div>
            </div>
          </nav>
<h1>REGISTRATION FROM</h1>
          <div class="container spl">
              <form action="action.php" method="post">
                  <div class="form-group">
                      <label for="fullname">Fullname</label><span class="error"><?php echo $nameErr; ?></span>
                      <div><input class="form-control" type="text" id="fullname" placeholder="Enter Name" name="fullname"></div>
                  </div>
                  <div class="form-group">
                    <label for="age">Age</label><span class="error"><?php echo $ageErr; ?></span>
                    <div><input class="form-control" type="text" id="age" placeholder="Enter Age" name="age"></div>
                 </div>
                 <div class="form-group">
                    <label for="email">Email</label><span class="error"><?php echo $emailErr; ?></span>
                    <div><input class="form-control" type="email" id="email" placeholder="Enter email" name="email"></div>
                 </div>
                 <div class="form-group">
                    <label for="Phone">Phone</label><span class="error"><?php echo $phoneErr; ?></span>
                    <div><input class="form-control" type="text" id="Phone" placeholder="Enter Phoneno." name="phone"></div>
                 </div>
                 <div class="form-group">
                    <label for="Address">Address</label>
                    <div><input class="form-control" type="text" id="Address" placeholder="Enter Address" name="address"></div>
                 </div>
                 <div class="form-group">
                    <label for="msg">Message</label>
                    <div ><input class="form-control" type="text" id="msg" placeholder="Leave a Message" name="msg"></div>
                 </div>
                 <div class="form-group">
                    <label for="gen">Gender</label><span class="error"><?php echo $genderErr; ?></span>
                    <select class="form-control" id="gen" name="gender">
                        <option value="">---SELECT---</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>
                </div>
                 <div class="form-group">
                    <label for="blood">Blood type</label><span class="error"><?php echo $bloodErr; ?></span>
                    <select class="form-control id="blood" name="blood">
                        <option value="">---SELECT---</option>
                        <option value="A+">A<sup>+</sup></option>
                        <option value="B+">B<sup>+</sup></option>
                        <option value="AB+">AB<sup>+</sup></option>
                        <option value="O+">O<sup>+</sup></option>
                        <option value="A-">A<sup>-</sup></option>
                        <option value="B-">B<sup>-</sup></option>
                        <option value="AB-">AB<sup>-</sup></option>
                        <option value="O-">O<sup>-</sup></option>
                      </select>
                 </div>
                 <button class="btn btn-default btn-sm pos">SUBMIT</button>
              </form>
          </div>

    </body>
</html>