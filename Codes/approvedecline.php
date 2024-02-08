<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="th-admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Reem Kufi:wght@400;700&display=swap" />	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=News+Cycle:wght@400;700&display=swap">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <title>Thaekedar-approve-decline</title>
</head>
<body>
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
    </div>
    </div>
<h2>Approve/Decline Contact</h2>
<div id="appdec-placement">
<div id="cn-grid">
  <div id="applicant-name">
    <p id="app-he">Name - Designation</p>
    <h3 id="app-data">Triyani Construction - Agency</h3>
  </div>
  <div id="applicant-location">
    <p id="app-he">Location</p>
    <h3 id="app-data">Banasthali, Balaju</h3>
  </div>
  <div id="applicant-email">
    <p id="app-he">Email</p>
    <h3 id="app-data">info@triyani.com.np</h3>
  </div>
  <div id="applicant-no">
    <p id="app-he">Phone no</p>
    <h3 id="app-data">9864562320</h3>
  </div>
  <div id="applicant-desc">
    <p id="app-he">Description</p>
    <div id="desc-box"><p>Established in 2021, Triyani Construction boasts [Number] years of crafting exceptional projects across diverse sectors. From dream homes to intricate infrastructure, our team of seasoned professionals leverages their expertise to deliver quality you can trust. </p></div>
  </div>
  <div id="applicant-links">
    <a href="https://instagram.com"><button class="app-btn">Instagram</button></a>
    <a href="https://facebook.com"><button class="app-btn">Facebook</button></a>
    <a href="https://triyani.com"><button class="app-btn">Website</button></a>
  </div>
  <div id="download-photo">
    <a href="photo/ag2.jpg" download><div>
      <img src="photo/ag2.jpg" alt="applicant-photo" id="applicant-photo">
      <p>Download Photo</p>
      <img src="photo/Download.png" alt="">
    </div></a>
  </div>
  <div id="download-docx">
    <a href="photo/ag2.jpg" download><div>
      <p>Download <br>Documentation/ license</p>
      <img src="photo/Download.png" alt="">
    </div></a>
  </div>
</div>
<div id="appdec-btn">
  <button id="approve-btn">Approve</button>
  <button id="decline-btn">Decline</button>
</div>
<span style="margin: 100px;"></span>
</div>
</body>
</html>