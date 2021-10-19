<nav class="navbar navbar-expand-md bg-dark navbar-light  fixed-top" id="main-nav">
    <div class="container">
        <a href="#home" class="navbar-brand">
            <?php 
                if(!isset($_SESSION['email'])) {
            ?>
            <a href="index.php" class="nav-link h3 text-primary" id="test">Ct<i class="fas fa-rupee-sign"></i>l Budget</a>
            <?php
                } else {
            ?>
            <a href="home.php" class="nav-link h3 text-primary" id="test">Ct<i class="fas fa-rupee-sign"></i>l Budget</a>  
            <?php
                }
            ?>
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <?php 
                if(!isset($_SESSION['email'])) {
            ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="about.php" class="nav-link text-primary">
                        <i class="fas fa-info-circle"></i> About Us</a>
                </li>
                <li class="nav-item">
                    <a href="signup.php" class="nav-link text-primary">
                        <i class="fas fa-user"></i> Sign Up</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link text-primary">
                        <i class="fas fa-sign-in-alt"></i> Login</a>
                </li>
            </ul>
            <?php
                } else {
            ?>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="about.php" class="nav-link text-white">
                        <i class="fas fa-info-circle"></i> About Us</a>
                </li>
                <li class="nav-item">
                    <a href="change_password.php" class="nav-link text-white">
                        <i class="fas fa-cog"></i> Change Pwd</a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link text-white">
                        <i class="fas fa-sign-in-alt"></i> Logout</a>
                </li>
            </ul>
            <?php 
            }
            ?>
        </div>
    </div>
</nav>