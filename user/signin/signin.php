<?php session_start();
include_once('../../includes/config.php');
// Code for login 
if (isset($_POST['login'])) {
    $password = $_POST['password'];
    $dec_password = md5($password);
    $useremail = $_POST['email'];
    $ret = mysqli_query($con, "SELECT user_id, username FROM users WHERE email='$useremail' and password='$dec_password'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {

        $_SESSION['id'] = $num['user_id'];
        $_SESSION['name'] = $num['username'];
        header("location:../user.php");
    } else {
        echo "<script>alert('Invalid username or password');</script>";
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
         <h1>User Login</h1>
         <form method="post">
            <div class="form-inputs">
               <div class="input-group">
                  <div class="error hide">Email cannot be empty</div>
                  <label for="Email"><i class="fa-regular fa-user"></i></label>
                  <input id="name" type="email" name="email" placeholder="Email" required />
               </div>
            </div>
            <div class="input-group">
               <div class="error hide">Password is not strong enough</div>
               <label for="password"><img class="lock" src="../img/lock.svg" alt="lock" /></label>
               <input id="password" type="password" placeholder="Password" name="password" required />
            </div>
            </div>
            <button name="login" type="submit">
               <span>Continue</span>
            </button>
         </form>
      </section>
   </main>
</body>

</html>
