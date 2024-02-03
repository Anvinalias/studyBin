<?php
session_start();
include_once('../includes/config.php');

// Check if the user is not logged in as admin
if (strlen($_SESSION['adminid']) == 0) {
    header('location:logout.php');
}

// Code for admin action on resource requests
if (isset($_GET['approve'])) {
    // Admin approves the resource
    $resourceId = $_GET['approve'];
    approveResource($resourceId);
}

if (isset($_GET['decline'])) {
    // Admin declines the resource
    $resourceId = $_GET['decline'];
    declineResource($resourceId);
}

// Function to approve the resource
function approveResource($resourceId)
{
    global $con;

    // Fetch the resource details from the database
    $fetchQuery = "SELECT * FROM resources WHERE resource_id='$resourceId'";
    $result = mysqli_query($con, $fetchQuery);
    $row = mysqli_fetch_assoc($result);

    // Fetch category, semester, and course values
    $category = $row['category'];
    $semester = $row['semester'];
    $course = $row['course'];

    // Move the file from the temp folder to the upload folder
    $tempFilePath = "../temp/" . $row['file'];
    $uploadFolderPath = "../upload/$category/$semester/$course/";

    $newFilePath = $uploadFolderPath . $row['file'];

    // Use rename for moving uploaded files
    if (rename($tempFilePath, $newFilePath)) {
        // Update the resource status to 'approved'
        $updateQuery = "UPDATE resources SET status='approved' WHERE resource_id='$resourceId'";
        mysqli_query($con, $updateQuery);
    }
}

// Function to decline the resource
function declineResource($resourceId)
{
    global $con;

    // Fetch the resource details from the database
    $fetchQuery = "SELECT * FROM resources WHERE resource_id='$resourceId'";
    $result = mysqli_query($con, $fetchQuery);
    $row = mysqli_fetch_assoc($result);

    // Delete the file from the temp folder
    $tempFilePath = "../temp/" . $row['file'];
    unlink($tempFilePath);

    // Update the resource status to 'declined'
    $updateQuery = "UPDATE resources SET status='denied' WHERE resource_id='$resourceId'";
    mysqli_query($con, $updateQuery);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <div class="section-title">Upload Requests</div>
                    <div class="upload-links">
                        <a href="../../../studyBin/admin/upload.php" class="upload">Upload</a>
                    </div>
                </div>
                <div class="approve">
                    <?php
                    // Fetch resources with 'pending' status and order by old requests first
                    $fetchResourcesQuery = "SELECT * FROM resources WHERE status='pending' ORDER BY created_at";
                    $resourcesResult = mysqli_query($con, $fetchResourcesQuery);

                    if (mysqli_num_rows($resourcesResult) > 0) {
                        while ($row = mysqli_fetch_assoc($resourcesResult)) {
                            echo '<div class="approve-card">';
                            echo '<div>';
                            echo '<h2>'. 'Title: ' . $row['title'] . '</h2>';
                            echo '<div class="context">'  . 'Category: ' . $row['category'] . '</div>';
                            echo '<div class="context">' . 'Course: '  . $row['course'] . '</div>';
                            echo '<div class="context">'  . 'Semester: ' . $row['semester'] . '</div>';
                            echo '<div class="context">'  . 'Upload By: ' . $row['uploaded_by'] . '</div>';
                            echo '<p>' . $row['created_at'] . '</p>';   
                            echo '</div>';
                            echo '<div class="card-controls">';
                            $fileFolderPath = '../temp/';
                            $filePath = $fileFolderPath .  $row['file'];
                            // Add a link to the dynamically generated file path for download
                            echo "<a href='{$filePath}' download><img src='img/down.png' alt='Download Icon'></a>";
                            // Add approve and decline links with resource ID as a parameter
                            echo '<a href="?approve=' . $row['resource_id'] . '" class="card-icon accept" title="Approve"></a>';
                            echo '<a href="?decline=' . $row['resource_id'] . '" class="card-icon reject" title="Decline"></a>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<h1 class="request-status">No new requests available</h1>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
