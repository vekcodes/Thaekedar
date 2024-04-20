<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="initial-scale=1, width=device-width">
  	<link rel="stylesheet"  href="css/index.css" />
	  <link rel="stylesheet" href="css/global-contact.css">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Reem Kufi:wght@400;700&display=swap" />	
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=News+Cycle:wght@400;700&display=swap">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
		<title>Thaekedar-Home</title>
</head>
<body>
<?php
    //message after rating and comment
    if(isset($_GET['message'])){
      echo"<div id='messbx'>
      <p id='thdai'>Thaekedar says: </p>
      <p id='mess'>". $_GET['message']. " </p>
      </div>";
    }
  ?>
<style>
	#messbx{
		position:absolute;
		top: 130px;
   	left: 70%;
  	font-family: 'montserrat';
  	color: #003366;
  	height: 50px;
  	width: 300px;
  	padding: 30px;
  	border-radius: 9px;
  	box-shadow: 3px 4px 11.4px rgba(0, 0, 0, 0.25);
}
#mess{
  color: rgb(255, 32, 32);
  font-family: 'reem kufi';
}
	</style>
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
						<?php
							if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){ ?>

								<div class="dropdown">
								<div class="signup-wrapper">
        				<div class="nav-link" id="signUpTxt">Profile</div>
      					</div>
								<div class="dropdown-content">
								<a href="user_dashboard.php">My DashBoard</a>
								<!-- <a href="notification.php">Notification</a> -->
								<a href="./request/logout.php">logout</a>
								</div>
								</div>
							<?php } else{ ?>
      			<a href="signup.php" id="lgin"><div class="signup-wrapper">
        				<div class="nav-link" id="signUpTxt">SignUp</div>
      			</div>
						</a><?php } ?>
    		</div>
  	</div>
		<h1 id="con-build">Connect<br>Build.</h1>
		<p id="herop">Your every needs of resources while building a <br>house or be it outsourcing</p>
		<img src="photo/th1.png" alt="heroimg" id="heroimg">
		<div id="herobut-wrap">
			<a href="./contactpages/agencies.php"><button class="herobutton">Agencies</button></a>
			<a href="./contactpages/architect.php"><button class="herobutton">Architect</button></a>
			<a href="./contactpages/suppliers.php"><button class="herobutton">Suppliers</button></a>
		</div>
		<div id="scroller-bg">
			<h3 id="sc-h3">Find your Construction needs  </h3>
			<div id="scroll-content">
			<?php
				for($i=0;$i<=2;$i++){
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
		</div>
		<div id="contact-section">
			<img src="photo/contactsection.jpg" alt="contactpic" id="contactpic">
			<div id="cn-glass">
				<h3 id="cn-h3">Add Your’s Contact Now</h3>
				<p id="cn-p">By Registering you can add your agency or your occupation in <br>Construction niche as a contact in Thaekedar.</p>
				<?php
					if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { ?>
						<a href="contactregister.php"><button id="cn-button">Learn More</button></a>
				<?php }else{ ?>
						<a href="login.php"><button id="cn-button">Learn More</button></a>
				<?php } ?>
			</div>
		</div>
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
<script>
  setTimeout(function(){
    document.getElementById('messbx').style.display = 'none';
  }, 5000);
</script>