<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"  href="index.css" />
  <link rel="stylesheet" href="viewcontact.css">
  <link rel="stylesheet" href="global-contact.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Reem Kufi:wght@400;700&display=swap" />	
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=News+Cycle:wght@400;700&display=swap">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
  <title>Thaekedar-Agencies</title>
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
        <a href="signup.php" id="lgin"><div class="signup-wrapper">
            <div class="nav-link" id="signUpTxt">SignUp</div>
        </div>
        </a>
    </div>
</div>
<h2 id="ag-heading">Find Agency That <br>suits you</h2>
<div id="ag-highlight"></div>
<form action="" id="search-form">
  <input type="text" id="search-input" placeholder="Search here">
  <button id="search-button"><img src="photo/Search.png" alt="search"></button>
</form>
</div>

<div id="contact-img" style="display:none">
  <button id="close" onclick="hidecontactform()"><img src="photo/Group 26.png" alt="cross"></button>
  <img src="photo/ag2.jpg" alt="cn-img" id="cn-img">
  <div id="cn-details">
    <h3 id="cn-heading">Triyani Construction Pvt ltd</h3>
    <div id="cn-location">
      <img src="photo/Location.png" alt="location" id="location-img">
      <p id="location">Balaju, Banasthali</p>
    </div>
    <p id="desc">Established in 2021, Triyani Construction boasts [Number] years of crafting exceptional projects across diverse sectors. From dream homes to intricate infrastructure, our team of seasoned professionals leverages their expertise to deliver quality you can trust.</p>
    <div id="cn-email-phone">
      <p><span id="bold">Email: </span>info@triyani.com.np</p>
      <p><span id="bold">Phone no: </span>9862468975</p>
    </div>
    <div id="btns">
      <a href=""><button class="cn-btn">Instagram</button></a>
      <a href=""><button class="cn-btn">Facebook</button></a>
      <a href=""><button class="cn-btn">Website</button></a>
    </div>
  </div>
</div>

<div id="contact-center-placement">
<?php
for($i=0;$i<=10;$i++){
  echo '<div id="contact-cards">
  <img src="photo/ag2.jpg" alt="agency-photo" id="contact-photo">
  <img src="photo/Group 25.png" id="top-rated">
  <p id="contact-name">Triyani Construction</p>
  <p id="contact-location">Balaju, Banasthali</p>
  <div id="gtcn-rating">
  <div id="get-contact">
  <a class ="get-contact-form" onclick= " showcontactform()"><button>Get Contact</button></a>
  </div>
  <div id="ratings">
    <img src="photo/Star.png" alt="rating">
    <p>5</p>
  </div>
  </div>
</div>';
}
?>
</div>
<script>
function showcontactform(){
  var f =document.getElementById("contact-img");
  f.style.display='block';
}
function hidecontactform(){
  var f =document.getElementById("contact-img");
  f.style.display='none';
  
}
</script>
</body>
</html>