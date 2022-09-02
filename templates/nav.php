<?php 
$sessionOwner = $session->get('auth_user_id');
$isAuth = new UserAuth();
?>  
<!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
<!--        <h1><a href="index.php">DColossus</a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="index.php"><img src="assets/img/dcolossus.jpg" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
        <?php if (strpos($_SERVER['REQUEST_URI'], "index") !== false) : ?>
            <li><a class="nav-link active" href="index.php">Home</a></li>
        <?php else : ?>
            <li><a class="nav-link" href="index.php">Home</a></li>
        <?php endif; ?>
        <?php if (strpos($_SERVER['REQUEST_URI'], "stakebet") !== false) : ?>
            <li><a class="nav-link active" href="stakebet.php">Betting</a></li>
        <?php else : ?>
            <li><a class="nav-link" href="stakebet.php">Betting</a></li>
        <?php endif; ?>
        <?php if (strpos($_SERVER['REQUEST_URI'], "about") !== false) : ?>
            <li><a class="nav-link active" href="about.php">About</a></li>
        <?php else : ?>
            <li><a class="nav-link" href="about.php">About</a></li>
        <?php endif; ?>
        <?php if (strpos($_SERVER['REQUEST_URI'], "contact") !== false) : ?>
            <li><a class="nav-link active" href="contact.php">Contact</a></li>
        <?php else : ?>
            <li><a class="nav-link" href="contact.php">Contact</a></li>
        <?php endif; ?>
        <?php if($isAuth->isAuthenticated()) : ?>
        <?php if (strpos($_SERVER['REQUEST_URI'], "profile") !== false) : ?>
            <li><a class="nav-link active" href="profile.php?u=<?php echo $sessionOwner; ?>">Profile</a></li>
        <?php else : ?> 
            <li><a class="nav-link" href="profile.php?u=<?php echo $sessionOwner; ?>">Profile</a></li>
        <?php endif; ?>
        <?php endif; ?>
        <?php if($isAuth->isAuthenticated()) : ?>
            <li><a class="nav-link" href="logout.php">Logout</a></li>
        <?php else : ?>
        <?php if (strpos($_SERVER['REQUEST_URI'], "login") !== false) : ?>
            <li><a class="nav-link active" href="login.php">Login</a></li>
        <?php else : ?>
            <li><a class="nav-link" href="login.php">Login</a></li>
        <?php endif; ?>
        <?php endif; ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->