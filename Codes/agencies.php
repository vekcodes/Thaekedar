<?php
include 'db_connect.php';
//data retrieve for contacts table
$sql="select * from contacts where designation = 'Agency'";
$sql_run = mysqli_query($conn,$sql);
$check_agency = mysqli_num_rows($sql_run)>0;
?>
<?php

if($check_agency){

  while($row = mysqli_fetch_array($sql_run)){
?>
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
						<a href="contactregister.php">Add Contact</a>
						<a href="notification.php">Notification</a>
						<a href="logout.php">logout</a>
						</div>
						</div>
					<?php } else{ ?>
      	    <a href="signup.php" id="lgin"><div class="signup-wrapper">
        			<div class="nav-link" id="signUpTxt">SignUp</div>
      			  </div>
					</a><?php } ?>
    </div>
</div>
<?php
    //message after rating and comment
    if(isset($_GET['message'])){
      echo"<div id='messbx'>
      <p id='thdai'>Thaekedar says: </p>
      <p id='mess'>". $_GET['message']. " </p>
      </div>";
    }
  ?>
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
  <img src="<?php echo $row['photo']?>" alt="cn-img" id="cn-img">
  <div id="cn-details">
    <h3 id="cn-heading"><?php echo $row['name'];?></h3>
    <div id="cn-location">
      <img src="photo/Location.png" alt="location" id="location-img">
      <p id="location"><?php echo $row['location'];?></p>
    </div>
    <p id="desc"><?php echo $row['description'];?></p>
    <div id="cn-email-phone">
      <p><span id="bold">Email: </span><?php echo $row['email'];?></p>
      <p><span id="bold">Phone no: </span><?php echo $row['phoneno'];?></p>
    </div>
    <div id="btns">
      <a href="<?php echo $row['iglink'];?>"><button class="cn-btn">Instagram</button></a>
      <a href="<?php echo $row['fblink'];?>"><button class="cn-btn">Facebook</button></a>
      <a href="<?php echo $row['weblink'];?>"><button class="cn-btn">Website</button></a>
    </div>
  </div>
  <div id="ratingnviewdisplay">
    <p style="margin: 0;">RATINGS :</p>
    <button id="ratingnumb">5 STAR</button>
    <p style="margin: 0;">Views :</p>
    <button id="ratingnumb">545</button>
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
  <img src="<?php echo $row['photo']?>" alt="cn-img" id="cn-img">
  <div id="cn-details">
    <h3 id="cn-heading"><?php echo $row['name'];?></h3>
    <div id="cn-location">
      <img src="photo/Location.png" alt="location" id="location-img">
      <p id="location"><?php echo $row['location'];?></p>
    </div>
    <p id="desc"><?php echo $row['description'];?></p>
    <div id="cn-email-phone">
      <p><span id="bold">Email: </span><?php echo $row['email'];?></p>
      <p><span id="bold">Phone no: </span><?php echo $row['phoneno'];?></p>
    </div>
    <div id="btns">
      <a href="<?php echo $row['iglink'];?>"><button class="cn-btn">Instagram</button></a>
      <a href="<?php echo $row['fblink'];?>"><button class="cn-btn">Facebook</button></a>
      <a href="<?php echo $row['weblink'];?>"><button class="cn-btn">Website</button></a>
    </div>
  </div>
  <form action="cnmtnrating.php" method="post">
    <input type="hidden" name="c_id" value="<?php echo $row['c_id']?>">
  <div id="ratingdisp">
    <p>RATE :</p>
    <select id="rate" required name="rate">
      <option value="">Rate</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <p style="margin: 0;">Views :</p>
    <button id="ratingnumb" style="width:40px;">545</button>
    </div>
    <div id="comment">
      <p>Comment :</p>
        <input type="text" id="comment-input" name="comment" required>
        <input type="submit" id="comment-submit" name="ratingncmntsubmit">
        <!-- <button id="comment-submit"><img src="photo/Email Send.png" alt=""></button> -->
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
<?php
$status = $row['status'];
if($status =='approved'){
echo'<div id="contact-center-placement">
    <div id="contact-cards">
    <img src="'.$row['photo'] .'" alt="agency-photo" id="contact-photo">
    <img src="photo/Group 25.png" id="top-rated">
    <p id="contact-name">'.$row['name'].'</p>
    <p id="contact-location">'.$row['location'].'</p>
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
}else{
  echo'<h2 id="ag-heading" style="padding-left: 45%;font-size: 25px;">No Data Found</h2>';
}
?>
  <?php
  }

}
else{

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