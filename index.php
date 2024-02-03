<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studyBin</title>
    <link rel="icon" href="/img/logo.svg">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="main-wrapper" class="main-wrapper">
        <header id="header-container">
            <div id="header-content">
                <div class="nav-logo">
                    <div id="side-button">
                        <button class="nav-overlay" type="button">
                            <img class="menubar" src="./img/menu.svg" alt="menu-nav">
                        </button>
                    </div>
                    <div class="site-logo-name">
                        <img src="img/logo.svg" alt="logo">
                        <div class="site-name">studyBin</div>
                    </div>
                </div>
                <div class="nav-link-button">
                    <ul class="nav-text">
                        <li class="home"> <a href="#section-1">Home</a></li>
                        <li class="contact"> <a href="#section-2">Community</a></li>
                    </ul>
                    <div class="register">
                        <a href="admin/signin/signin.php">
                            <button type="button" class="login">
                                Admin Login
                            </button>
                        </a>
                        <a href="user/signin/signin.php">
                            <button type="button" class="login">
                                User Login
                            </button>
                        </a>
                        <a href="user/signup/signup.php">
                            <button type="button" class="get-started">
                                Get Started
                            </button>
                        </a>
                    </div>
                </div>
            </div>

        </header>
        <div id="side-wrapper">
            <nav id="side-nav">
                <header id="side-nav-head">
                    <div class="nav-head">
                        <img src="img/logo-h.svg" alt="logo">
                        <div class="nav-site-name">studyBin</div>
                    </div>
                    <button type="button" id="nav-close">
                        <img src="img/cross.svg">
                    </button>
                </header>
                <div class="divider"></div>
                <div class="nav-page-links">
                    <div class="nav-link">
                        <a href="index.php" id="home">Home</a>
                    </div>
                    <div id="resource-segment" class="nav-link">
                        <a href="../studyBin/user/user.php" id="file">Resource</a>
                        <button id="resource-button">
                            <img src="img/arrow-h.svg" alt="arrow icon">
                        </button>
                    </div>
                    <ul id="select-program">
                        <li class="program-segment">
                            <a href="../studyBin/user/user.php">BSC</a>
                            <button id="program-button1">
                                <img src="img/arrow-h.svg" alt="arrow icon">
                            </button>
                        </li>
                    </ul>
                    <div class="nav-link">
                        <a href="https://chat.whatsapp.com/LQjDeR9h4zwLuyjid3DOFk" id="community">Community</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="page-content-wrapper" id="page-content-wrapper">
            <section id="section-1">
                <div class="section-1-content">
                    <div class="section-1-text">
                        <h1 class="section-1-heading">
                            Inspiring Growth
                        </h1>
                        <h3 class="section-1-quote">
                            Get what you're looking for!
                        </h3>
                    </div>
                </div>

                <div class="section-1-search">
                    <a href="./user/user.php">
                        <button type="button" class="access">
                            Access Resources
                        </button>
                    </a>

                </div>
                <button id="arrow-icon">
                    <img src="img/arrow.svg" alt="arrow icon">
                </button>
            </section>

            <section id="section-2">
                <div class="section-3-content">
                    <h1 class="section-3-heading">
                        Community
                    </h1>
                    <h2 class="section-3-quote">
                        Connect with us through our whatsapp community
                    </h2>
                    <a href="https://chat.whatsapp.com/LQjDeR9h4zwLuyjid3DOFk" class="section-3-link">Join</a>
                </div>
            </section>
        </div>
        <script src="script.js"></script>
</body>

</html>