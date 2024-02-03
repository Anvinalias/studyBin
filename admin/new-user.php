<?php
session_start();
include_once('../includes/config.php');

if (strlen($_SESSION['adminid']) == 0) {
    header('location:logout.php');
} else {
    // Code for User Creation
    if (isset($_POST['create'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $role = $_POST['role'];

        // Perform validation and error handling as needed

        $query = mysqli_query($con, "INSERT INTO users (username, email,password, role)
                                    VALUES ('$username','$email','$password', '$role')");

        if ($query) {
            echo "<script>alert('User created successfully');</script>";
            echo "<script type='text/javascript'> document.location = 'manage-users.php'; </script>";
        } else {
            echo "<script>alert('Error creating user');</script>";
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
<body>

<div class="page-grid">
<?php include_once('includes/top-nav.php'); ?>
<?php include_once('includes/side-nav.php'); ?>
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Create User</h1>
                    <div class="card mb-4">
                        <form method="post">
                            <div class="card-body">
                                <!-- Your form inputs go here -->
                                <div class="mb-3">
                                    <label for="username" class="form-label">username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select id="role" name="role" class="form-control" required>
                                        <option value="student">Student</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" name="create">Create User</button>
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
