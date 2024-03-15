<?php
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thaekedar- Contact Register</title>
  <link rel="stylesheet" href="contactregister.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Reem Kufi:wght@400;700&display=swap" />	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=News+Cycle:wght@400;700&display=swap">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
</head>
<body>
  <div class="th-nav">
    <b class="thaekedar">THAEKEDAR</b>
    <img src="photo/thaekedarlogo.png" alt="logo" id="img-logo">
    <div class="nav-link-div">
        <div><a class="nav-link" href="index.php">Home</a></div>
        <a href="agencies.php"><div class="nav-link">Agencies </div></a>
        <div class="dropdown">

          <div class="nav-link" id="peoples">Peoples</div>

          <div class="dropdown-content">
            <a href="interiordesigner.php">Interior Designer</a>
            <a href="architect.php">Architect</a>
            <a href="engineer.php">Engineer</a>
          </div>
        </div>
        <a href="suppliers.php"><div class="nav-link">Suppliers</div></a>
        <div class="dropdown">
          <div class="signup-wrapper">
            <div class="nav-link" id="signUpTxt">Profile</div>
          </div>
          <div class="dropdown-content">
            <a href="logout.php">logout</a>
            <a href="contactregister.php">Add Contact</a>
          </div>
        </div>
    </div>
</div>
<h2 id="title">Add Your's <br>Contact</h2>
<div id="highlight"></div>
<form action="">
  <div id="first-contact">
  <div class="form-fields">
  <label>Name</label> <br>
  <input type="text" placeholder="Enter Name" name="name" value="" disabled><br>
  </div>
  <div class="form-fields">
  <label>Location</label><br>
  <input type="text" placeholder="Enter Location" name="location" required><br>
  </div>
  <div class="form-fields">
  <label>Designation</label><br>
  <select name="Designation" required>
    <option value="Agency">Agency</option>
    <option value="Interior Designer">Interior Designer</option>
    <option value="Architect">Architect</option>
    <option value="Engineer">Engineer</option>
    <option value="Supplier">Supplier</option>
  </select>
  </div>
  <div class="form-fields">
  <label>Phone no</label><br>
  <input type="number" placeholder="Enter your phone no" name="phoneno" required>
  </div>
</div>
<div class="form-desc" id="desc-grp">
<label>Description</label><br>
<textarea type="text" placeholder="Enter small description about your agency/service and experience" class="desc" name="description" required></textarea>
</div>
<div id="cn-heading">
  <p id="form-cn-det">Contact Details</p>
  <div id="cd-highlight"></div>
</div>
<div id="contact-detail">
  <div class="form-fields">
  <label>Email</label> <br>
  <input type="email" placeholder="Enter your Email" name="email" value="<?php echo $_SESSION['user_email']; ?>" disabled><br>
  </div>
  <div class="form-fields">
  <label>Instagram link</label><br>
  <input type="text" placeholder="Eg:https://instagram.com/triyani/" name="iglink"><br>
  </div>
  <div class="form-fields">
  <label>Facebook</label><br>
  <input type="text" placeholder="Eg:https://facebook.com/triyani/" name="fblink"><br>
  </div>
  <div class="form-fields">
  <label>Website link</label><br>
  <input type="text" placeholder="Eg:https://triyani.com.np/" name="weblink">
  </div>
</div>

<!-- Upload photo -->
<div id="photo-heading">
  <p id="form-ph">Photo</p>
  <div id="ph-highlight"></div>
</div>
<div id="ph-drag-area"onclick="inputclick()">
    <img src="photo/Upload to Cloud.png" alt="drop" id="drag-img"><br>
    <p class="drag-p1">Click to upload</p>
    <p class="drag-p2">or</p>

    <div class="choose-wrapper"onclick="inputclick()">
      <div class="nav-link" id="chooseTxt">Choose file</div>
    </div>
    <input type="file" name="photo" id="drag-input" hidden accept=".png,.jpeg,.jpg">
    <p id="drag-formats">Supported formats: png,jpeg,jpg</p>
</div>

<div id="docx-heading">
  <p id="form-docx">Document/license</p>
  <div id="docx-highlight"></div>
</div>

<!-- document / license -->
<div id="docx-drag-area"onclick="inputclick()">
    <img src="photo/Upload to Cloud.png" alt="drop" id="drag-img"><br>
    <p class="drag-p1">Click to upload</p>
    <p class="drag-p2">or</p>

    <div class="choose-wrapper"onclick="inputclick()">
      <div class="nav-link" id="chooseTxt">Choose file</div>
    </div>
    <input type="file" name="docx" id="drag-input" hidden accept=".png,.jpeg,.jpg,.pdf">
    <p id="drag-formats">Supported formats: png,jpeg,jpg,pdf</p>
</div>
<button id="ca-submit">Submit Profile for Verification</button>
</form>

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
<script src="script.js"></script>
</html>
<?php }else{
 header("Location: login.php"); 
}?>