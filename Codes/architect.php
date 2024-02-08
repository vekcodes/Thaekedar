<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"  href="index.css" />
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
<h2 id="ag-heading">Find Architect That <br>suits you</h2>
<div id="ag-highlight"></div>
<form action="" id="search-form">
  <input type="text" id="search-input" placeholder="Search here">
  <button id="search-button"><img src="photo/Search.png" alt="search"></button>
</form>
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
    <button type="submit">Get Contact</button>
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
</body>
</html>