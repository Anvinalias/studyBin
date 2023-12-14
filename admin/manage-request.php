<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from user_requests where id='$adminid'");
if($msg)
{
echo "<script>alert('Request deleted');</script>";
}
}
   ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Manage Requests</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../includes/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="admin.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    </head>
    <body>
  <div class="page-grid">
    <?php include_once('includes/top-nav.php'); ?>
    <?php include_once('includes/side-nav.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage Request</h1>
            
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Request Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Topic</th>   
                                        <th>Category</th>
                                        <th>Course</th>
                                        <th>Semester</th>
                                        <th>Requested by</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                    
                                    <tbody>
                                    <?php
                                    $cnt = 1;
                                    $sql = "SELECT * FROM user_requests";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = $result->fetch_assoc()) {
                                         echo "<tr>";
                                        echo "<td>{$row['topic']}</td>";
                                        echo "<td>{$row['category']}</td>";
                                        echo "<td>{$row['course']}</td>";
                                        echo "<td>{$row['semester']}</td>";
                                        echo "<td>{$row['user_id']}</td>";
                                        echo "<td>{$row['status']}</td>";
                                        echo "<td>{$row['created_at']}</td>";
                                        echo "<td>";
                                        echo "<a href='user-profile.php?uid={$row['id']}'><i class='fas fa-edit'></i></a>";
                                        echo "<a href='manage-users.php?id={$row['id']}' onClick=\"return confirm('Do you really want to delete');\"><i class='fa fa-trash' aria-hidden='true'></i></a>";
                                        echo "</td>";
                                        echo "</tr>";
                                        $cnt++;
                                    }
                                    ?>
                                </tbody>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>