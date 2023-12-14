<?php
session_start();
include_once('../includes/config.php');

if (strlen($_SESSION['id']) == 0) {
    header('location:logout.php');
} else {
    // Code for Event Creation

    $userid = $_SESSION['id'];
    $query = mysqli_query($con, "select * from users where user_id='$userid'");
    $result = mysqli_fetch_array($query);
    $username = $result['username'];


    if (isset($_POST['request'])) {
        $topic = $_POST['topic'];
        $category = $_POST['category'];
        $program = $_POST['program'];
        $course = $_POST['course'];
        $semester = $_POST['semester'];
        $username = $POST['username'];
        $details = $_POST['details'];

        
        // Perform validation and error handling as needed

        $query = mysqli_query($con, "INSERT INTO user_requests (username, user_id,topic, category, program, course, semester,details)
                                      VALUES ('$username', '$userid','$topic','$category', '$program', '$course', '$semester', '$details')");

        if ($query) {
            echo "<script>alert('Request successful');</script>";
            echo "<script type='text/javascript'> document.location = 'requests.php'; </script>";
        } else {
            echo "<script>alert('Error requesting');</script>";
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
            <label for="topic" class="form-label">Topic</label>
            <input type="text" class="form-control" id="topic" name="topic" required>
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
            <label for="details" class="form-label">Details</label>
            <textarea class="form-control" id="details" name="details" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="request">Request</button>
        </div>
    </div>
</form>

                    </div>
                </div>
            </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
</body>
</html>
