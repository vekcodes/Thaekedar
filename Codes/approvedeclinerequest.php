<?php
include 'db_connect.php';
$contact_id = $_POST['contact_id'];
//if admin approves it
if(isset($_POST['approve'])){
  //prepare sql statement
  $sql = "UPDATE contacts SET status = 'approved' WHERE c_id = '$contact_id' AND status IN ('decline', 'inprocess')";
  $stmt = $conn->prepare($sql);
  //executing the statement
  if ($stmt->execute()) {
    if ($stmt->affected_rows === 1) {
      header('Location: th-admin.php?message=approved successfully');
    }
}
}
//if admin declines it
if(isset($_POST['decline'])){
  //prepare sql statement
  $sql = "UPDATE contacts SET status = 'declined' WHERE c_id = '$contact_id' AND status IN ('decline', 'inprocess')";
  $stmt = $conn->prepare($sql);
  //executing the statement
  if ($stmt->execute()) {
    if ($stmt->affected_rows === 1) {
      header('Location: th-admin.php?message=declined successfully');
    }
}
}
?>