<?php session_start(); 
include_once('../../includes/config.php');
// Code for login 
if(isset($_POST['login']))
{
  $adminusername=$_POST['username'];
  $pass=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM users WHERE username='$adminusername' and password='$pass' and role = 'admin'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="../admin.php";
$_SESSION['login']=$_POST['username'];
$_SESSION['adminid']=$num['user_id'];
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="signin.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>studyBin</title>
   <link rel="icon" href="/img/logo.svg">
   <link rel="stylesheet" href="css/style.css" />
   <link href="https://fonts.googleapis.com/css2?family=Jaldi&family=Manrope:wght@400;700&display=swap"
      rel="stylesheet" />
   <script src="https://kit.fontawesome.com/6faef4fc76.js" crossorigin="anonymous"></script>
</head>

<body>
   <main>
      <section class="media-container">
         <img class="vector" src="../img/4354884.svg" alt="vector drawing" />
      </section>
      <section class="form-container">
         <h1>Admin Login</h1>
         <form method="post">
   <div class="form-inputs">
      <div class="input-group">
         <div class="error hide">Name cannot be empty</div>
         <label for="name"><i class="fa-regular fa-user"></i></label>
         <input id="name" type="text" name="username" placeholder="Username" required />
      </div>
   </div>
   <div class="input-group">
      <div class="error hide">Password is not strong enough</div>
      <label for="password"><img class="lock" src="../img/lock.svg" alt="lock" /></label>
      <input id="password" type="password" placeholder="Password" name="password" required />
   </div>
   <button name="login" type="submit">
      <span>Continue</span>
   </button>
</form>

      </section>
   </main>
</body>

</html>