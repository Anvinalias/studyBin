<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="rejectport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/img/logo.svg">
  <link rel="stylesheet" href="admin.css">
  <title>studyBin</title>
</head>

<body>
  <div class="page-grid">
    <div id="side-button">
      <button class="nav-overlay" type="button">
          <img class="menubar" src="img/menu.svg" alt="menu-nav">
      </button>
  </div>
    <div class="top-nav">
      <div class="top-nav-container">
        <div class="top-nav-avatar">
          <div class="avatar"></div>
          <div class="admin">admin</div>
        </div>
        <div class="top-nav-options">
          <input type="text" id="search-bar" placeholder=" "></input>
          <div class="divider"></div>
          <div id="alerts"></div>
        </div>
      </div>
    </div>
    <div class="side-nav">
      <div class="nav-head">
        <img src="img/logo-h.svg" alt="logo">
        <div class="nav-site-name">studyBin</div>
      </div>
      <div class="h-divider"></div>
      <a href="admin.php" id="home">Home</a>
      <a href="resource.php" id="resource">Resource</a>
      <a href="" id="users">Users</a>
      <a href="" id="exchange">Exchange</a>
      <div class="h-divider"></div>
      <a href="" id="settings">Settings</a>
      <a href="signin/logout.php" id="logout">Logout</a>
    </div>
    <div class="main-content">
      <div id="approves">
        <div class="approve-head">
          <div class="section-title">Approve</div>
          <div class="upload-links">
            <a href="" class="upload">Upload</a>
          </div>
        </div>
        <div class="approve">
          <div class="approve-card">
            <div>
              <h2>Maths [2021]</h2>
              <p>01/02/2023</p>
              <div class="context">Question Paper</div>
            </div>
            <div class="card-controls">
              <div class="card-icon accept"></div>
              <div class="card-icon reject"></div>
            </div>
          </div>
          <div class="approve-card">
            <div>
              <h2>Software Lab-4</h2>
              <p>11/06/2023</p>
              <div class="context">Lab Records</div>
            </div>
            <div class="card-controls">
              <div class="card-icon accept"></div>
              <div class="card-icon reject"></div>
            </div>
          </div>
          <div class="approve-card">
            <div>
              <h2>DC Mod-3</h2>
              <p>01/05/2023</p>
              <div class="context">Lecture Notes</div>
            </div>
            <div class="card-controls">
              <div class="card-icon accept"></div>
              <div class="card-icon reject"></div>
            </div>
          </div>
          <div class="approve-card">
            <div>
              <h2>MP module-1</h2>
              <p>22/12/2022</p>
              <div class="context">Lecture Notes</div>
            </div>
            <div class="card-controls">
              <div class="card-icon accept"></div>
              <div class="card-icon reject"></div>
            </div>
          </div>
        </div>
      </div>
      <div id="news">
        <div class="section-title">Requests</div>
        <div id="request">
          <div class="request-image" style="background-image: url(img/)"></div>
          <div>
            <h3>@user1</h3>
            <p>Title: 8086 MP</p>
            <p>Course: Microprocessor</p>
            <p>Category: Lecture Notes
              <a href="">More&nbsp;&rarr;</a>
            </p>
          </div>
          <div class="h-divider"></div>
          <div class="request-image" style="background-image: url(img/)"></div>
          <div>
            <h3>@user2</h3>
            <p>Title: 2022</p>
            <p>Course: Data Communication</p>
            <p>Category: Question Paper
              <a href="">More&nbsp;&rarr;</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>