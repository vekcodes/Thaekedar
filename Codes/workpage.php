<?php
include './utils/db_connect.php';
session_start();
$c_id = $_POST['c_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Work Page</title>
  <?php include "header.php" ?>
</head>

<body>
  <?php
  include "usersidebar.php";
  $sql = "SELECT * 
   FROM users u 
   JOIN connected c ON u.user_id = c.user_id 
   WHERE c.c_id = $c_id and c.request_status = 'accepted'";
  $result = mysqli_query($conn, $sql);
  ?>
  <div id="center-placement" style="position: absolute;left: 450px;top: 150px;">
    <div class="form-desc">
      <form action="worksubmit.php" method="post" enctype="multipart/form-data">
        <label for="">Worked with: </label><br>
        <select name="workedwith">
          <option value="">---Choose Your Connection---</option>
          <?php
          if ($result) {
            while ($row = mysqli_fetch_array($result)) { ?>
              <option value="<?php echo $row['user_id']; ?>" name="option_id"><?php echo $row['name']; ?></option>
          <?php }
          } ?>
        </select>
    </div>
    <br>
    <div class="form-desc">
      <label>Work Description</label>
      <p style="margin: 0; display:inline; font-family: 'reem kufi'; font-size: 13px;">(Max length: 253 words)</p><br>
      <textarea type="text" placeholder="Enter small description about the project/work" class="desc" name="w_description" required maxlength="253"></textarea>
    </div>
    <!-- photo -->
    <div id="photo-heading" style="top: 350px;left:23%">
      <p id="form-ph">Photo</p>
      <div id="ph-highlight"></div>
    </div>
    <div id="ph-drag-area" onclick="inputclick()" style="top: 420px;left:0;">
      <img src="photo/Upload to Cloud.png" alt="drop" id="drag-img"><br>
      <p class="drag-p1">Click to upload</p>
      <p class="drag-p2">or</p>

      <div class="choose-wrapper" onclick="inputclick()">
        <div class="nav-link" id="chooseTxt">Choose file</div>
      </div>
      <input type="file" name="work_photo" id="drag-input" hidden accept=".png,.jpeg,.jpg" required>
      <p id="drag-formats">Supported formats: png,jpeg,jpg</p>
    </div>
  </div>
  <input type="hidden" name="c_id" value="<?php echo $c_id; ?>">
  <button id="ca-submit" style="top: 950px;" name='submit-work'>Submit</button>
  </form>
  <script>
    const input = document.getElementById("drag-input");

    function inputclick() {
      input.click();
    }
  </script>
</body>

</html>