<?php 
include ('./utils/db_connect.php');

    $c_id = $_GET['c_id'];
    $sql = "delete from contacts where c_id = '$c_id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: managecn.php?message=Contact removed successfully");
    }

else{
    header("Location: managecn.php?message=Contact removal failed");
}
?>