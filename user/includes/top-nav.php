<div class="top-nav">
  <div class="top-nav-container">
    <div class="top-nav-avatar">
      <?php

      // Check if the user is logged in
      if ($_SESSION['id'] !== null) {
        // Assuming you have a database connection
        include_once('../includes/config.php');
        
        // Fetch the username from the users table based on the user ID
        $userid = $_SESSION['id'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE user_id='$userid'");

        // Check if the query was successful
        if ($query) {
          // Fetch the username
          while ($result = mysqli_fetch_array($query)) {
            echo '<div class="username">' . $result['username'] . '</div>';
          }
        } else {
          // If there was an error in the query
          echo "Error: " . mysqli_error($con);
        }

      } else {
        // If not logged in, display "Guest"
        echo '<div class="username">Guest</div>';
      }
      ?>

    </div>
  </div>
</div>