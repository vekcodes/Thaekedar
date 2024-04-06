<?php
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php include 'header.php';?>

  <title>Thaekedar-signup</title>
		<style>
			@import url('https://fonts.googleapis.com/css2?family=News+Cycle:wght@400;700&display=swap');
		</style>
</head>
<body>
  <div class="th-nav">
    <b class="thaekedar">THAEKEDAR</b>
    <img src="photo/thaekedarlogo.png" alt="logo" id="img-logo">
    <div class="nav-link-div">
        <div><a class="nav-link" href="index.php">Home</a></div>
        <a href="./contactpages/agencies.php"><div class="nav-link">Agencies </div></a>
        <div class="dropdown">

          <div class="nav-link" id="peoples">Peoples</div>

          <div class="dropdown-content">
            <a href="./contactpages/interiordesigner.php">Interior Designer</a>
            <a href="./contactpages/architect.php">Architect</a>
            <a href="./contactpages/engineer.php">Engineer</a>
          </div>
        </div>
        <a href="./contactpages/suppliers.php"><div class="nav-link">Suppliers</div></a>
        <a href="login.php" id="lgin"><div class="signup-wrapper">
            <div class="nav-link" id="signUpTxt">Login</div>
        </div>
        </a>
    </div>
</div>
<h1 id="con-build">Sign Up</h1>
<p id="herop">Already a member? <a href="login.php">Log in</a></p>
<?php
    //password not matched error 
    if(isset($_GET['error'])){
      echo"<div id='messbx'>
      <p id='thdai'>Thaekedar says: </p>
      <p id='mess'>". $_GET['error']. " </p>
      </div>";
    }
  ?>
<div id="signup-bx">

<form action="signupRequest.php" method="post" name="signupform">
  <div class="form-fields">
  <label>Name</label> <br>
  <input type="text" placeholder="Enter Name" name="name" required><br>
  </div>
  <div class="form-fields">
  <label>Email</label><br>
  <input type="email" placeholder="Enter Email" name="email" required><br>
  </div>
  <div class="form-fields">
  <label>Phone number</label><br>
  <input type="number" placeholder="Enter Phone no" name="phoneno" required><br>
  </div>
  <div class="form-fields">
  <label>Password</label><br>
  <input type="password" placeholder="Enter Password" name="password" id="pass" required><br>
  </div>
  <div class="form-fields">
  <label>Confirm Password</label><br>
  <input type="password" placeholder="Confirm Password" id="cpass" name="cpassword" required>
  </div>
  <button type="submit" id="signup-button" name="submit">
    <h3>Sign Up</h3>
  </button>
</form>
</div>
<!-- <p id="or">or</p> -->
<img src="photo/th1.png" alt="heroimg" id="heroimg">
<!-- footer -->
<div id="thfooter">
  <img src="photo/thaekedarlogo.png" alt="footerlogo" id="ft-img-logo">
  <b class="ft-thaekedar">THAEKEDAR</b>
  <p id="ft-p">Thaekedar is a Construction Contact <br>management system where you can find <br>contacts of agencies to suppliers</p>
  <h3 id='ft-follow'>Follow us on:</h3>
  <div id="ft-links">
    <a href="https://www.facebook.com"><img src="photo/Facebook.png" alt="fblink" class="ft-link-img"></a>
    <a href="https://www.twitter.com"><img src="photo/Twitter.png" alt="twlink"class="ft-link-img"></a>
    <a href="https://www.instagram.com"><img src="photo/Instagram.png" alt="iglink"class="ft-link-img"></a>
  </div>
  <div id="ft-desc-link">
    <h3 id="ft-bold-link">Links</h3>
    <div id="ft-desc-li">
      <a href=""class='ft-link-a'><p>Agencies</p></a>
      <a href=""class='ft-link-a'><p>Interior Designer</p></a>
      <a href=""class='ft-link-a'><p>Architect</p></a>
      <a href=""class='ft-link-a'><p>Engineer</p></a>
      <a href=""class='ft-link-a'><p>Suppliers</p></a>
    </div>
  </div>
    <div id="ft-desc-contact">
      <h3 id="ft-bold-contact">Contact</h3>
      <div id="ft-desc-cn">
        <a href=""class='ft-link-a'><p>9863456312</p></a>
        <a href="mailto:info@thaekedar.com" class='ft-link-a'><p>info@thaekedar.com</p></a>
      </div>
    </div>
    <div id="ft-copyright">Copyright © 2024 Thaekedar. All rights reserved.</div>
</div>
<script src="script.js"></script>
</body>
</html>