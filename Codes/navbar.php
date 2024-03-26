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