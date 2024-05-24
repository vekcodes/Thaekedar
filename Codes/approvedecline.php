<?php
session_start();
include ('./utils/db_connect.php');
$contact_id = $_POST['contact_id'];
$sql = "SELECT * FROM contacts WHERE c_id = '$contact_id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
//user == admin check

if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include 'header.php';?>
    <title>Thaekedar-approve-decline</title>
</head>
<body>
<?php
include'adminsidebar.php';
?>
<h2 id='th-admin-head'>Approve/Decline Contact</h2>
<div id="appdec-placement">
<div id="cn-grid">
  <div id="applicant-name">
    <p id="app-he">Name - Designation</p>
    <h3 id="app-data"><?php echo $row['name']?> - <?php echo $row['designation']?></h3>
  </div>
  <div id="applicant-location">
    <p id="app-he">Location</p>
    <h3 id="app-data"><?php echo $row['location']?></h3>
  </div>
  <div id="applicant-email">
    <p id="app-he">Email</p>
    <h3 id="app-data"><?php echo $row['email']?></h3>
  </div>
  <div id="applicant-no">
    <p id="app-he">Phone no</p>
    <h3 id="app-data"><?php echo $row['phoneno']?></h3>
  </div>
  <div id="applicant-desc">
    <p id="app-he">Description</p>
    <div id="desc-box"><p><?php echo $row['description']?></p></div>
  </div>
  <div id="applicant-links">
    <a href="<?php echo $row['iglink']?>"><button class="app-btn">Instagram</button></a>
    <a href="<?php echo $row['fblink']?>"><button class="app-btn">Facebook</button></a>
    <a href="<?php echo $row['weblink']?>"><button class="app-btn">Website</button></a>
  </div>
  <div id="download-photo">
    <a href="<?php echo $row['photo']?>" download><div>
      <img src="<?php echo $row['photo']?>" alt="applicant-photo" id="applicant-photo">
      <p>Download Photo</p>
      <img src="photo/Download.png" alt="">
    </div></a>
  </div>
  <div id="download-docx">
    <a href="<?php echo $row['document']?>" download><div>
      <p>Download <br>Documentation/ license</p>
      <img src="photo/Download.png" alt="">
    </div></a>
  </div>
</div>
<div id="appdec-btn">
  <form action="./request/approvedeclinerequest.php" method="post">
  <input type="hidden" name="contact_id" value="<?php echo $contact_id; ?>">
  <button id="approve-btn" onclick="approve()" name="approve">Approve</button>
  <button id="decline-btn" onclick="decline()" name="decline">Decline</button>
  </form>
</div>
<span style="margin: 100px;"></span>
</div>
<script>
  function approve(){
    confirm("Do you want to approve?");
  }
  function decline(){
    confirm("Do you want to decline?");
  }
</script>
</body>
</html>
<?php }else{
 header("Location: th-adminlogin.php"); 
}?>