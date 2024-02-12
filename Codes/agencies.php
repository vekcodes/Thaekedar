<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"  href="index.css" />
  <link rel="stylesheet" href="view.css">
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
        <?php
          session_start();
					if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){ ?>

						<div class="dropdown">
						<div class="signup-wrapper">
        		<div class="nav-link" id="signUpTxt">Profile</div>
      			</div>
						<div class="dropdown-content">
						<a href="logout.php">logout</a>
						<a href="contactregister.php">Add Contact</a>
						</div>
						</div>
					<?php } else{ ?>
      	    <a href="signup.php" id="lgin"><div class="signup-wrapper">
        			<div class="nav-link" id="signUpTxt">SignUp</div>
      			  </div>
					</a><?php } ?>
    </div>
</div>
<h2 id="ag-heading">Find Agency That <br>suits you</h2>
<div id="ag-highlight"></div>
<form action="" id="search-form">
  <input type="text" id="search-input" placeholder="Search here">
  <button id="search-button"><img src="photo/Search.png" alt="search"></button>
</form>
</div>
<?php 
if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_email']) ){
?>
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
  <div id="ratingdisplay">
    <p>RATINGS :</p>
    <button id="ratingnumb">5 STAR</button>
  </div>
<div id="cmnt">
  <p id="cmnth">Comments :</p>
  <div id="cmnt-slide">
    <button class="cmnt-slide"><img src="photo/Group 27.png"></button>
    <button class="cmnt-slide"><img src="photo/Group 28.png"></button>
  </div>
  <div id="slide-comments">
    <p>The Quality of their work is exceptional, I had only worked twice with them still so much fullfiling </p>
  </div>
</div>
</div>
<?php }?>

<?php 
if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']) ){
?>
<div id="contact-img" style="display: none" >
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
  <div id="ratingdisp">
    <p>RATE :</p>
    <select id="rate">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    </div>
    <div id="comment">
      <p>Comment :</p>
      <form action="comment.php">
        <input type="text" id="comment-input">
        <button id="comment-submit"><img src="photo/Email Send.png" alt=""></button>
      </form>
    </div>
<div id="cmnt">
  <p id="cmnth">Comments :</p>
  <div id="cmnt-slide">
    <button class="cmnt-slide"><img src="photo/Group 27.png"></button>
    <button class="cmnt-slide"><img src="photo/Group 28.png"></button>
  </div>
  <div id="slide-comments">
    <p>The Quality of their work is exceptional, I had only worked twice with them still so much fullfiling </p>
  </div>
</div>
</div>
<?php }?>
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