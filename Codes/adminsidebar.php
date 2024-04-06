<?php
include ('./utils/db_connect.php');
if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){ ?>

<div id="admin-sidebar">
        <img src="photo/thaekedarlogo.png" alt="logo" id="admin-logo">
        <h1>THAEKEDAR</h1>
    <div id="admin-menu">
        <div id="aprovedecline">
            <a href="applicants.php"><p>Approve/Decline Contact</p></a>
        </div>
        <div id="mgmtcn">
            <a href="managecn.php"><p>Manage contact</p></a>
        </div>
        <div id="mgmtcn">
            <a href="./request/logout.php"><p>Logout</p></a>
        </div>
    </div>
    </div>
<?php }else{
 header("Location: th-adminlogin.php"); 
}?>