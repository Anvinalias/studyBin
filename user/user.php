<?php
// Start or resume the session
session_start();

// Set default values for session variables if not already set
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = null; // Set default user ID
}

?>


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
                        <div class="section-title">Choose a Category</div>
                        <div class="upload-links">
                            <a href="../../studyBin/user/upload.php" class="upload">Upload</a>
                        </div>
                    </div>
                    <div id="resource-folder">
                        <!-- Modify the links to include the category parameter -->
                        <a href="semester.php?category=notes">
                            <div class="folder">
                                <img src="img/folder.svg" alt="folder icon">
                                <div>Notes</div>
                            </div>
                        </a>
                        <a href="semester.php?category=qp">
                            <div class="folder">
                                <img src="img/folder.svg" alt="folder icon">
                                <div>Question Papers</div>
                            </div>
                        </a>
                        <a href="semester.php?category=syllabus">
                            <div class="folder">
                                <img src="img/folder.svg" alt="folder icon">
                                <div>Syllabus</div>
                            </div>
                        </a>
                        <a href="semester.php?category=records">
                            <div class="folder">
                                <img src="img/folder.svg" alt="folder icon">
                                <div>Lab Records</div>
                            </div>
                        </a>
                        <a href="semester.php?category=text">
                            <div class="folder">
                                <img src="img/folder.svg" alt="folder icon">
                                <div>Text Books</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
