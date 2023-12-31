<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="rejectport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/img/logo.svg">
  <link rel="stylesheet" href="admin.css">
  <title>studyBin</title>
</head>

<body>
  <div class="page-grid">
    <?php include_once('includes/top-nav.php'); ?>
    <?php include_once('includes/side-nav.php'); ?>
    <div class="main-content">
      <div id="approves">
        <div class="approve-head">
          <div class="section-title">Approve</div>
          <div class="upload-links">
            <a href="../../../studyBin/admin/upload.php" class="upload">Upload</a>
          </div>
        </div>
        <div class="approve">
          <div class="approve-card">
            <div>
              <h2>Maths [2021]</h2>
              <p>01/02/2023</p>
              <div class="context">Question Paper</div>
            </div>
            <div class="card-controls">
              <div class="card-icon accept"></div>
              <div class="card-icon reject"></div>
            </div>
          </div>
          <div class="approve-card">
            <div>
              <h2>Software Lab-4</h2>
              <p>11/06/2023</p>
              <div class="context">Lab Records</div>
            </div>
            <div class="card-controls">
              <div class="card-icon accept"></div>
              <div class="card-icon reject"></div>
            </div>
          </div>
          <div class="approve-card">
            <div>
              <h2>DC Mod-3</h2>
              <p>01/05/2023</p>
              <div class="context">Lecture Notes</div>
            </div>
            <div class="card-controls">
              <div class="card-icon accept"></div>
              <div class="card-icon reject"></div>
            </div>
          </div>
          <div class="approve-card">
            <div>
              <h2>MP module-1</h2>
              <p>22/12/2022</p>
              <div class="context">Lecture Notes</div>
            </div>
            <div class="card-controls">
              <div class="card-icon accept"></div>
              <div class="card-icon reject"></div>
            </div>
          </div>
        </div>
      </div>
      <div id="news">
        <div class="section-title">Requests</div>
        <div id="request">
          <div>
            <h3>@user1</h3>
            <p>Title: 8086 MP</p>
            <p>Course: Microprocessor</p>
            <p>Category: Lecture Notes
              <a href="">More&nbsp;&rarr;</a>
            </p>
          </div>
          <div class="h-divider"></div>
          <div>
            <h3>@user2</h3>
            <p>Title: 2022</p>
            <p>Course: Data Communication</p>
            <p>Category: Question Paper
              <a href="">More&nbsp;&rarr;</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>