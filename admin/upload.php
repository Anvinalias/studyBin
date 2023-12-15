<?php
session_start();
include_once('includes/config.php');

if (strlen($_SESSION['id']) == 0) {
    header('location:logout.php');
} else {
    // Code for project Creation
    if (isset($_POST['project'])) {
        $user_id = $_SESSION['id'];
        $project_name = $_POST['project_name'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $keywords = $_POST['keywords'];

        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        //tmp_name ---	A temporary address where the file is located before processing the upload request
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $tmp = explode('.', $file_name);
        $file_ext = end($tmp);
        $extensions = "zip";

        // Allow certain file formats

        if ($file_ext === $extensios) {
            echo "This extension isn't allowed , please choose a jpg,jpeg or png file.";
            die();
        } 
        else {
            //if error not occurs than this will run so we can make 
            $error = false;
            // if every things is okay than move pic to upload (file going to be sent,destination where file is saved)
            move_uploaded_file($file_tmp,"upload/". $file_name);
        }
    }

    if ($error === false) {
        $query = mysqli_query($con, "INSERT INTO resources (title, topic, details, file, category, program, course, semester,keywords, uploaded_by)
        VALUES ('$title', '$topic', '$details', '$file', '$category', '$program', '$course', '$semester', '$keywords', $username)");

                if ($query) {
                    echo "<script>alert('Resource upload successfully');</script>";
                    echo "<script type='text/javascript'> document.location = 'project-uploads.php'; </script>";
                } else {
                    echo "<script>alert('Error creating Uploads');</script>";
                }
            } 
        }
?>





<?php
session_start();
include_once('../includes/config.php');

if (strlen($_SESSION['adminid']) == 0) {
    header('location:logout.php');
} else {
    // Code for Event Creation

    $userid = $_SESSION['id'];
    $query = mysqli_query($con, "select * from users where user_id='$userid'");
    $result = mysqli_fetch_array($query);
    $username = $result['username'];
    if (isset($_POST['upload'])) {
        $title = $_POST['title'];
        $topic = $_POST['topic'];
        $details = $_POST['details'];
        $file = $_POST['file'];
        $category = $_POST['category'];
        $program = $_POST['program'];
        $course = $_POST['course'];
        $semester = $_POST['semester'];
        $keywords = $_POST['keywords'];    
        
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        //tmp_name ---	A temporary address where the file is located before processing the upload request
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $tmp = explode('.', $file_name);
        $file_ext = end($tmp);
        $extensions = "pdf";

        // Allow certain file formats

        if ($file_ext === $extensios) {
            echo "This extension isn't allowed , please choose a pdf file.";
            die();
        } 
        else {
            //if error not occurs than this will run so we can make 
            $error = false;
            // if every things is okay than move pic to upload (file going to be sent,destination where file is saved)
            move_uploaded_file($file_tmp,"../upload/". $file_name);
        }

        
        // Perform validation and error handling as needed

        $query = mysqli_query($con, "INSERT INTO resources (title, topic, details, file, category, program, course, semester,keywords, uploaded_by)
                                      VALUES ('$title', '$topic', '$details', '$file', '$category', '$program', '$course', '$semester', '$keywords', $username)");

        if ($query) {
            echo "<script>alert('Upload successful');</script>";
            echo "<script type='text/javascript'> document.location = 'manage-resource'; </script>";
        } else {
            echo "<script>alert('Error uploading');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../includes/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="admin.css">


        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<div class="page-grid">
    <?php include_once('includes/top-nav.php'); ?>
    <?php include_once('includes/top-nav.php');?>
        <?php include_once('includes/side-nav.php');?>
         <!-- $categoriesQuery = mysqli_query($con, "SELECT * FROM event_category");
         $categories = mysqli_fetch_all($categoriesQuery, MYSQLI_ASSOC);
     -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Contribute</h1>
                    <div class="card mb-4">
                    <form method="post">
    <div class="card-body">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="topic" class="form-label">Topic</label>
            <input type="text" class="form-control" id="topic" name="topic" required>
        </div>
        <div class="mb-3">
            <label for="details" class="form-label">Details</label>
            <textarea class="form-control" id="details" name="details" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <input type="file" class="form-control" id="file" name="file" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" name="category" class="form-control" required>
                <option value="Category1">Lecture Notes</option>
                <option value="Category2">Question Papers</option>
                <option value="Category3">Lab Records</option>
                <option value="Category4">Summary</option>
                
            </select>
        </div>
        <div class="mb-3">
            <label for="program" class="form-label">Program</label>
            <select id="program" name="program" class="form-control" required>
                <option value="Program1">Bsc Computer Science</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <select id="course" name="course" class="form-control" required>
                <option value="Course1">Computer Fundamentals</option>
                <option value="Course2">Discrete Mathematics 1</option>
                <option value="Course3">Digital Fundamentals</option>
                <option value="Course4">Fine tune English</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <select id="semester" name="semester" class="form-control" required>
                <option value="Semester1">Semester 1</option>
                <option value="Semester2">Semester 2</option>
                <option value="Semester2">Semester 3</option>
                <option value="Semester2">Semester 4</option>
                <option value="Semester2">Semester 5</option>
                <option value="Semester2">Semester 6</option>

                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <select id="year" name="year" class="form-control" required>
                <option value="2021-22">2021-22</option>
                <option value="2022-23">2022-23</option>
                <option value="2023-24">2023-24</option>
                <option value="2024-25">2024-25</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="mb-3">
            <label for="keywords" class="form-label">Keywords</label>
            <select id="keywords" name="keywords[]" class="form-control" multiple required>
                <option value="Keyword1">Keyword 1</option>
                <option value="Keyword2">Keyword 2</option>
                <option value="Keyword2">Keyword 3</option>
                <option value="Keyword2">Keyword 4</option>
                <option value="Keyword2">Keyword 5</option>

                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="upload">Upload</button>
        </div>
    </div>
</form>

                    </div>
                </div>
            </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
</body>
</html>
