<?php session_start();
require_once('../../includes/config.php');

//Code for Registration 
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $dec_password = md5($password);


  $sql = mysqli_query($con, "SELECT user_id FROM users WHERE email='$email'");
  $row = mysqli_num_rows($sql);
  if ($row > 0) {
    echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
  } else {
    $msg = mysqli_query($con, "INSERT INTO users(username,email,password) VALUES('$username','$email','$dec_password')");

    if ($msg) {
      echo "<script>alert('Registered successfully');</script>";
      echo "<script type='text/javascript'> document.location = '../signin/signin.php'; </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Sign-up</title>
   <link rel="icon" href="/img/logo.svg">
   <link rel="stylesheet" href="css/style.css" />
   <link href="https://fonts.googleapis.com/css2?family=Jaldi&family=Manrope:wght@400;700&display=swap"
      rel="stylesheet" />
   <script src="https://kit.fontawesome.com/6faef4fc76.js" crossorigin="anonymous"></script>
   
   <script type="text/javascript">
    function checkpass() {
        let password = document.getElementById('password').value;
        let confirmPassword = document.getElementById('confirm').value;

        if (password !== confirmPassword) {
            alert("Passwords do not match");
            document.getElementById('confirm').focus();
            return false;
        }
        return true;
    }
</script>

</head>

<body>
   <main>
      <section class="media-container">
         <img class="vector" src="../img/4354884.svg" alt="vector drawing" />
      </section>
      <section class="form-container">
         <h1>Sign up</h1>
<form method="post" name="signup" onsubmit="return checkpass();">
   <div class="form-inputs">
      <div class="input-group">
         <div class="error hide">Name cannot be empty</div>
         <label for="name"><i class="fa-regular fa-user"></i></label>
         <input id="name" type="text" name="username" placeholder="Username" required />
      </div>

      <div class="input-group">
         <div class="error hide">Email is not valid</div>
         <label for="email"><i class="fa-regular fa-at"></i></label>
         <input type="email" id="email" placeholder="Email" name="email" required />
      </div>

      <div class="input-group">
         <div class="error hide">Password is not strong enough</div>
         <label for="password"><img class="lock" src="../img/lock.svg" alt="lock" /></label>
         <input id="password" type="password" placeholder="Password" name="password" required />
      </div>

      <div class="input-group">
         <div class="error hide">Passwords do not match</div>
         <label for="confirm"><img class="lock" src="../img/lock.svg" alt="lock" /></label>
         <input type="password" id="confirm" placeholder="Confirm password" required />
      </div>
   </div>
   <button name="submit" type="submit">
      <span>Continue</span>
   </button>
   <a href="../signin/signin.php">Already have an account? Login</a>
</form>

      </section>
   </main>
</body>

</html>