<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Sign-up</title>
   <link rel="icon" href="/icons/logo.svg">
   <link rel="stylesheet" href="css/style.css" />
   <link href="https://fonts.googleapis.com/css2?family=Jaldi&family=Manrope:wght@400;700&display=swap"
      rel="stylesheet" />
   <script src="https://kit.fontawesome.com/6faef4fc76.js" crossorigin="anonymous"></script>
</head>

<body>
   <main>
      <section class="media-container">
         <img class="vector" src="images/4354884.svg" alt="vector drawing" />
      </section>
      <section class="form-container">
         <h1>Sign up</h1>
         <form spellcheck="false" autocomplete="off">
            <div class="form-inputs">
               <div class="input-group">
                  <div class="error hide">Name cannot be empty</div>
                  <label for="name"><i class="fa-regular fa-user"></i></label>
                  <input id="name" type="text" name="name" placeholder="Full name" required />
               </div>

               <div class="input-group">
                  <div class="error hide">Email is not valid</div>
                  <label for="email"><i class="fa-regular fa-at"></i></label>
                  <input type="email" id="email" placeholder="Email" name="email" required />
               </div>

               <div class="input-group">
                  <div class="error hide">Password is not strong enough</div>
                  <label for="password"><img class="lock" src="images/lock.svg" alt="lock" /></label>
                  <input id="password" type="password" placeholder="Password" name="password" required />
               </div>

               <div class="input-group">
                  <div class="error hide">Passwords do not match</div>
                  <label for="confirm"><img class="lock" src="images/lock.svg" alt="lock" /></label>
                  <input type="password" id="confirm" placeholder="Confirm password" required />
               </div>
            </div>
            <button>
               <span>Continue</span>
            </button>
            <small class="login-text">Already have an account? <a href="../signin/index.php">Login</a></small>
         </form>
      </section>
   </main>
</body>

</html>