<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/logo.svg">
  <link rel="stylesheet" href="user.css">
  <title>studyBin</title>

</head>
<body>
  <div class="page-grid">
  <?php include_once('includes/top-nav.php'); ?>
  <?php include_once('includes/side-nav.php'); ?>
    <div class="main-content">
      <div class="section-1">
        <h1 class="program">Bsc Computer Science</h1>
        <div id="resources">
          <div class="resource-head">
            <div class="section-title">Resource</div>
            <div class="upload-links">
              <a href="" class="upload">Upload</a>
            </div>
          </div>
          <div id="resource-folder">
            <div class="folder">
              <img src="img/folder.svg" alt="folder icon">
              <div>Syllabus</div>
            </div>
            <div class="folder">
              <img src="img/folder.svg" alt="folder icon">
              <div>Lecture Notes</div>
            </div>
            <div class="folder">
              <img src="img/folder.svg" alt="folder icon">
              <div>Question Papers</div>
            </div>
            <div class="folder">
              <img src="img/folder.svg" alt="folder icon">
              <div>Important Topics</div>
            </div>
            <div class="folder">
              <img src="img/folder.svg" alt="folder icon">
              <div>Lab Records</div>
            </div>
            <div class="folder">
              <img src="img/folder.svg" alt="folder icon">
              <div>Text Books</div>
            </div>
            <div class="folder">
              <img src="img/folder.svg" alt="folder icon">
              <div>Class Playlist</div>
            </div>
          </div>
        </div>
      </div>
      <div id="updates">
        <div class="section-title">Latest</div>
        <div id="latest">
          <div>
            <h3>@user1</h3>
            <p>Title: Computer Security</p>
            <p>Category: Lecture Notes
              <a href="">More&nbsp;&rarr;</a>
            </p>
          </div>
          <div class="h-divider"></div>
          <div>
            <h3>@user2</h3>
            <p>Title: Network Fundamentals</p>
            <p>Category: Question Paper
              <a href="">More&nbsp;&rarr;</a>
            </p>
          </div>
          <div class="h-divider"></div>
          <div>
            <h3>@user3</h3>
            <p>Title: Microprocessor</p>
            <p>Category: Lab Record
              <a href="">More&nbsp;&rarr;</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>