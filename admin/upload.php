<?php
session_start();
include_once('../includes/config.php');

if (strlen($_SESSION['adminid']) == 0) {
    header('location:logout.php');
} else {
    // Code for Event Creation
    if (isset($_POST['upload'])) {
        $title = $_POST['title'];
        $topic = $_POST['topic'];
        $details = $_POST['details'];
        $file = $_POST['file'];
        $category = $_POST['category'];
        $program = $_POST['program'];
        $course = $_POST['course'];
        $semester = $_POST['semester'];
        $year = $_POST['year'];
        $keywords = $_POST['keywords'];

        
        // Perform validation and error handling as needed

        $query = mysqli_query($con, "INSERT INTO resources (title, topic, details, file, category, program, course, semester,yearofstudy,keywords)
                                      VALUES ('$title', '$topic', '$details', '$file', '$category', '$program', '$course', '$semester', '$year', '$keywords')");

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
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <?php include_once('includes/navbar.php');?>
    <div id="layoutSidenav">
        <?php include_once('includes/sidebar.php');
         $categoriesQuery = mysqli_query($con, "SELECT * FROM event_category");
         $categories = mysqli_fetch_all($categoriesQuery, MYSQLI_ASSOC);
    ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Create Event</h1>
                    <div class="card mb-4">
                        <form method="post">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="event_name" class="form-label">Event Name</label>
                                    <input type="text" class="form-control" id="event_name" name="event_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="date_of_event" class="form-label">Date of Event</label>
                                    <input type="date" class="form-control" id="date_of_event" name="date_of_event" required>
                                </div>
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category ID</label>
                                    <select id="category_id" name="category_id" class="form-control" required>
                                        <?php
                                        foreach ($categories as $category) {
                                            echo "<option value='{$category['id']}'>{$category['category_name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="venue" class="form-label">Venue</label>
                                    <input type="text" class="form-control" id="venue" name="venue" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
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
            <?php include('../includes/footer.php');?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
</body>
</html>
