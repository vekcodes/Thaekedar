<div id="admin-sidebar">
    <img src="photo/thaekedarlogo.png" alt="logo" id="admin-logo">
    <h1>THAEKEDAR</h1>
<div id="admin-menu">
    <div id="mgmtcn">
        <a href="index.php"><p>Home</p></a>
    </div>
    <div id="mgmtcn">
        <a href="contactregister.php"><p>Add Contact</p></a>
    </div>
    <div id="mgmtcn">
        <a href="connected.php"><p>Connected</p></a>
    </div>
    <?php

    $sql= 'select c_id from contacts where user_id ='.$_SESSION["user_id"];
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
      ?>
    <div id="mgmtcn">
        <a href="addworks.php"><p>Add Works</p></a>
    </div>
    <?php }?>
    <div id="mgmtcn">
        <a href="notification.php"><p>Notification</p></a>
    </div>
    <div id="mgmtcn">
        <a href="./request/logout.php"><p>logout</p></a>
    </div>
</div>
</div>