<?php
// Start or resume the session
session_start();

// Set default values for session variables if not already set
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = null; // Set default user ID

}?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/logo.svg">
  <link rel="stylesheet" href="user.css">
  <title>studyBin</title>

  <script>
    function updateCourses() {
      // Get the selected semester value
      var selectedSemester = document.getElementById("semester").value;

        // Get the selected category from the URL parameter
      var urlParams = new URLSearchParams(window.location.search);
      var selectedCategory = urlParams.get('category');

      // Get the folder container element
      var folderContainer = document.getElementById("resource-folder");

      // Clear existing folders
      folderContainer.innerHTML = "";

      // Populate folders and courses based on the selected semester
      switch (selectedSemester) {
        case "Semester1":
      addFolder(folderContainer, selectedCategory, "Computer Fundamentals");
      addFolder(folderContainer, selectedCategory, "Mathematics 1");
      addFolder(folderContainer, selectedCategory, "Digital Fundamentals");
      addFolder(folderContainer, selectedCategory, "Fine tune English");
      addFolder(folderContainer, selectedCategory, "Programming using C");
      break;
    case "Semester2":
      addFolder(folderContainer, selectedCategory, "COA");
      addFolder(folderContainer, selectedCategory, "Mathematics 2");
      addFolder(folderContainer, selectedCategory, "Data Communication");
      addFolder(folderContainer, selectedCategory, "Issue that matter");
      addFolder(folderContainer, selectedCategory, "OOP's using CPP");
      break;
    case "Semester3":
      addFolder(folderContainer, selectedCategory, "Statistics");
      addFolder(folderContainer, selectedCategory, "DBMS");
      addFolder(folderContainer, selectedCategory, "SAD");
      addFolder(folderContainer, selectedCategory, "Network Fundamentals");
      addFolder(folderContainer, selectedCategory, "Data Structure");
      break;
    case "Semester4":
      addFolder(folderContainer, selectedCategory, "Linux");
      addFolder(folderContainer, selectedCategory, "Microprocessor");
      addFolder(folderContainer, selectedCategory, "Web Programming using PHP");
      addFolder(folderContainer, selectedCategory, "CAOT");
      break;
    case "Semester5":
      addFolder(folderContainer, selectedCategory, "SS & OS");
      addFolder(folderContainer, selectedCategory, "IT & Environment");
      addFolder(folderContainer, selectedCategory, "Java programming");
      addFolder(folderContainer, selectedCategory, "Computer Security");
      break;
    case "Semester6":
      addFolder(folderContainer, selectedCategory, "Computer Graphics");
      addFolder(folderContainer, selectedCategory, "Big Data Analytics");
      addFolder(folderContainer, selectedCategory, "Python And Latex");
      break;
        // Add cases for other semesters
      }
    }

    function addFolder(container, category, folderName, folderImg = "folder") {
      var folderElement = document.createElement("div");
      folderElement.className = "folder";
      folderElement.innerHTML = '<img src="img/folder.svg" alt="folder icon"><a href="resources.php?category=' + encodeURIComponent(category) + '&course=' + encodeURIComponent(folderName) + '">' + folderName + '</a>';

      // Append the folder to the container
      container.appendChild(folderElement);
    }

    // Initial population of folders and courses based on the default selected semester
    window.onload = function() {
      // Initial population of folders and courses based on the default selected semester
      updateCourses();
    };
  </script>

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
            <div class="section-title">Choose a Semester</div>
            <div class="select-container">
              <select id="semester" onchange="updateCourses()">
                <option value="Semester1">Semester 1</option>
                <option value="Semester2">Semester 2</option>
                <option value="Semester3">Semester 3</option>
                <option value="Semester4">Semester 4</option>
                <option value="Semester5">Semester 5</option>
                <option value="Semester6">Semester 6</option>
                <!-- Add options for other semesters -->
              </select>
            </div>
            <div class="upload-links">
              <a href="../../studyBin/user/upload.php" class="upload">Upload</a>
            </div>
          </div>
          <div id="resource-folder">
            <!-- Folders and courses will be dynamically added here -->
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
