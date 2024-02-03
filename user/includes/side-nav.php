<div class="side-nav">
    <div class="nav-head">
      <img src="img/logo-h.svg" alt="logo">
      <div class="nav-site-name">studyBin</div>
    </div>
    <div class="h-divider"></div>
    <a href="../user/user.php" id="home">Dashboard</a>
    <a href="../../../studyBin/user/upload.php" id="resource">Upload</a>
    <a href="../../../studyBin/user/requests.php" id="exchange">Request</a>
    <a href="https://chat.whatsapp.com/LQjDeR9h4zwLuyjid3DOFk" id="community">Community</a>
    <div class="h-divider"></div>

    <?php
    // Check if the user is logged in
    if (!empty($_SESSION['id'])) {
        echo '<a href="../../../studyBin/user/logout.php" id="logout">Logout</a>';
    }
    ?>
</div>
