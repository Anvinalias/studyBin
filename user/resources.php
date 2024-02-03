<?php
// Start or resume the session
session_start();

// Set default values for session variables if not already set
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = null; // Set default user ID

}
// Mapping between course names and folder names
$courseFolderMapping = array(
    "Computer Fundamentals" => "cf",
    "Mathematics 1" => "maths1",
    "Digital Fundamentals" => "digital",
    "Fine tune English" => "english1",
    "Programming using C" => "c",
    "COA" => "coa",
    "Mathematics 2" => "maths2",
    "Data Communication" => "dc",
    "Issue that matter" => "english2",
    "OOP's using CPP" => "cpp",
    "Statistics" => "stati",
    "DBMS" => "dbms",
    "SAD" => "sad",
    "Network Fundamentals" => "nf",
    "Data Structure" => "ds",
    "Linux" => "linux",
    "Microprocessor" => "mp",
    "Web Programming using PHP" => "php",
    "CAOT" => "caot",
    "SS & OS" => "ssos",
    "IT & Environment" => "it",
    "Java programming" => "java",
    "Computer Security" => "cs",
    "Computer Graphics" => "cg",
    "Big Data Analytics" => "bg",
    "Python And Latex" => "py"
);

session_start();
include_once('../includes/config.php');

// Retrieve category, semester, and course values from URL parameters
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : '';
$selectedCourse = isset($_GET['course']) ? urldecode($_GET['course']) : '';
$selectedCourseFolder = isset($courseFolderMapping[$selectedCourse]) ? $courseFolderMapping[$selectedCourse] : $selectedCourse;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Resources</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../includes/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="user.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="page-grid">
        <?php include_once('includes/top-nav.php'); ?>
        <?php include_once('includes/side-nav.php'); ?>
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Resources</h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Resource Details
                        <a href='upload.php'>
                            <button class="btn btn-primary" style="float: right;">Upload</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Course</th>
                                    <th>Semester</th>
                                    <th>Uploaded By</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cnt = 1;
                                $sql = "SELECT * FROM resources WHERE course = '$selectedCourseFolder' AND category = '$selectedCategory'";
                                $result = mysqli_query($con, $sql);

                                // Check if the query was successful
                                if ($result) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>{$row['title']}</td>";
                                        echo "<td>{$row['category']}</td>";
                                        echo "<td>{$row['course']}</td>";
                                        echo "<td>{$row['semester']}</td>";
                                        echo "<td>{$row['uploaded_by']}</td>";
                                        echo "<td>";
                                        
                                        // Assuming your files are stored in a folder structure based on category, semester, course, and file
                                        $fileFolderPath = '../upload/';
                                        $filePath = $fileFolderPath . $row['category'] . '/' . $row['semester'] . '/' . $row['course'] . '/' . $row['file'];

                                        // Add a link to the dynamically generated file path for download
                                        echo "<a href='{$filePath}' download><img src='img/down.png' alt='Download Icon'></a>";
                                        echo "</td>";
                                        echo "</tr>";

                                        $cnt++;
                                    }
                                } else {
                                    echo "Error executing the query: " . mysqli_error($con);
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>
</html>
