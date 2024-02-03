<?php
session_start();
include_once('../includes/config.php');

// Check if the user is logged in
if ($_SESSION['id'] === null) {
    // Display an alert using JavaScript
    echo '<script>alert("Please login to upload"); window.location.href = "signin/signin.php";</script>';
    
    // Ensure that no further code is executed
    exit;
}


$userid = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM users WHERE user_id='$userid'");
$result = mysqli_fetch_array($query);
$username = $result['username'];

// Code for resource upload by user
if (isset($_POST['upload'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $program = $_POST['program'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];

    $upfile = $_FILES['file']['name'];
    $ext = pathinfo($upfile, PATHINFO_EXTENSION);
    $validExt = array('pdf', 'txt', 'doc', 'docx', 'ppt', 'zip', 'jpg', 'pptx', 'jpeg');

    if (empty($upfile)) {
        echo "<script>alert('Attach a file');</script>";
    } elseif ($_FILES['file']['size'] <= 0) {
        echo "<script>alert('File size is not proper');</script>";
    } elseif (!in_array($ext, $validExt)) {
        echo "<script>alert('Not a valid file');</script>";
    } else {
        // Define the temporary storage path
        $tempFolder = "../temp/";

        // Generate a unique filename for the temporary folder
        $filename = pathinfo($upfile, PATHINFO_FILENAME);
        $fileext = strtolower(pathinfo($upfile, PATHINFO_EXTENSION));
        $tempNotefile = $filename . 'R' . rand(0, 100) . '.' . $fileext;

        // Move the uploaded file to the temporary folder
        if (move_uploaded_file($_FILES['file']['tmp_name'], $tempFolder . $tempNotefile)) {
            // Insert the resource information into the database with 'pending' status
            $status = 'pending';
            $in = "INSERT INTO resources (title, file, category, uploaded_by, program, course, semester, status)
                   VALUES ('$title', '$tempNotefile', '$category', '$username', '$program', '$course', '$semester', '$status')";

            $stmt = mysqli_prepare($con, $in);

            if (!$stmt) {
                die("Preparation failed: " . mysqli_error($con));
            }

            $success = mysqli_stmt_execute($stmt);

            if ($success) {
                echo "<script> alert('File uploaded successfully. It will be reviewed by the admin.'); window.location.href='upload.php';</script>";
            } else {
                echo "<script> alert('Error while uploading: " . mysqli_error($con) . "'); </script>";
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../includes/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="user.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
</head>
<div class="page-grid">
    <?php include_once('includes/top-nav.php'); ?>
    <?php include_once('includes/top-nav.php'); ?>
    <?php include_once('includes/side-nav.php'); ?>
    <!-- $categoriesQuery = mysqli_query($con, "SELECT * FROM event_category");
         $categories = mysqli_fetch_all($categoriesQuery, MYSQLI_ASSOC);
     -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Contribute</h1>
                <div class="card mb-4">
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">File</label>
                                <input type="file" class="form-control" id="file" name="file" required>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select id="category" name="category" class="form-control" required>
                                    <option value="notes">Note</option>
                                    <option value="syllabus">Syllabus</option>
                                    <option value="qp">Question Paper</option>
                                    <option value="records">Lab Record</option>
                                    <option value="text">Text Book</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="program" class="form-label">Program</label>
                                <select id="program" name="program" class="form-control" required>
                                    <option value="Program1">Bsc Computer Science</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="semester" class="form-label">Semester</label>
                                <select id="semester" name="semester" class="form-control" onchange="updateCourses()"
                                    required>
                                    <option value="Semester1">Semester 1</option>
                                    <option value="Semester2">Semester 2</option>
                                    <option value="Semester3">Semester 3</option>
                                    <option value="Semester4">Semester 4</option>
                                    <option value="Semester5">Semester 5</option>
                                    <option value="Semester6">Semester 6</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="course" class="form-label">Course</label>
                                <select id="course" name="course" class="form-control" required>
                                    <!-- Options will be dynamically populated based on the selected semester -->
                                </select>
                            </div>

                            <script>
                                function updateCourses() {
                                    // Get the selected semester value
                                    var selectedSemester = document.getElementById("semester").value;

                                    // Get the course select element
                                    var courseSelect = document.getElementById("course");

                                    // Clear existing options
                                    courseSelect.innerHTML = "";

                                    // Populate options based on the selected semester
                                    switch (selectedSemester) {
                                        case "Semester1":
                                            addOption(courseSelect, "cf", "Computer Fundamentals");
                                            addOption(courseSelect, "maths1", "Discrete Mathematics 1");
                                            addOption(courseSelect, "digital", "Digital Fundamentals");
                                            addOption(courseSelect, "english1", "Fine tune English");
                                            addOption(courseSelect, "c", "Programming using C");
                                            break;
                                        case "Semester2":
                                            addOption(courseSelect, "coa", "Computer organization & Architecture");
                                            addOption(courseSelect, "maths2", "Discrete Mathematics 2");
                                            addOption(courseSelect, "dc", "Data communication");
                                            addOption(courseSelect, "english2", "Issue that matter English2");
                                            addOption(courseSelect, "cpp", "OOP using CPP");
                                            break;
                                        case "Semester3":
                                            addOption(courseSelect, "stati", "Probabillty and statistics");
                                            addOption(courseSelect, "dbms", "Database Management systems");
                                            addOption(courseSelect, "sad", "System Analysis and Design");
                                            addOption(courseSelect, "nf", "Network Fundamentals");
                                            addOption(courseSelect, "ds", "Data Structure using cpp");
                                            break;
                                        case "Semester4":
                                            addOption(courseSelect, "linux", "linux administartion");
                                            addOption(courseSelect, "mp", "Microprocessor & Assembly Language Programming");
                                            addOption(courseSelect, "php", "Web Programming using PHP");
                                            addOption(courseSelect, "caot", "Computer Aided Optimization Techiques");

                                            break;
                                        case "Semester5":
                                            addOption(courseSelect, "ssos", "System Software & Operating System");
                                            addOption(courseSelect, "it", "IT & Enviroment");
                                            addOption(courseSelect, "java", "Java programming using linux");
                                            addOption(courseSelect, "cs", "Computer security");

                                            break;
                                        case "Semester6":
                                            addOption(courseSelect, "cg", "Computer Graphics");
                                            addOption(courseSelect, "bg", "Big Data-Analytics");
                                            addOption(courseSelect, "py", "Python And Latex");

                                            break;
                                        // Add cases for other semesters
                                    }
                                }

                                function addOption(selectElement, value, text) {
                                    var option = document.createElement("option");
                                    option.value = value;
                                    option.text = text;
                                    selectElement.add(option);
                                }

                                // Initial population of courses based on the default selected semester
                                updateCourses();
                            </script>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" name="upload">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
    </body>

</html>