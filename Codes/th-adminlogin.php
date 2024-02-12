<?php
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){
    header("Location: index.php");
    exit();
}else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thaekedar-login</title>
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Reem Kufi:wght@400;700&display=swap" />	
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
		<style>
			@import url('https://fonts.googleapis.com/css2?family=News+Cycle:wght@400;700&display=swap');
		</style>
</head>
<body>
<h1 id="con-build">Admin Log In</h1>
<?php
    //email not matched error 
    if(isset($_GET['error'])){
      echo"<div id='messbx'>
      <p id='thdai'>Thaekedar Dai says: </p>
      <p id='mess'>". $_GET['error']. " </p>
      </div>";
    }
  ?>
<div id="signup-bx">
<form action="loginRequest.php" method="post">
  <div class="form-fields">
  <label>Email</label><br>
  <input type="email" placeholder="Enter Email" name="email" required><br>
  </div>
  <div class="form-fields">
  <label>Password</label><br>
  <input type="password" placeholder="Enter Password" name="password" required><br>
  </div>
  <button type="submit" id="login-button">
    <h3>Login</h3>
  </button>
</form>
</div>
<p id="or">or</p>
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
</body>
</html>
<?php }?>