<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles-about_us.css"/>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--rating-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="style_const.css">
</head>
<body style="  background-color: #121212
">
  <nav id="navbar" class="nav">
    <div class="navbar">
      <i class="bx bx-menu"></i>
      <div class="logo"><a href="#">ComBri</a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">ComBri</span>
          <i class="bx bx-x"></i>
        </div>
        <ul class="links">
          <li><a href="../profile/profile.php#my_profile">Profile</a></li>
          <li><a href="index.php">Home</a></li>
          <li><a href="index-about_use.php">About us</a></li>
        </ul>
      </div>
      
      <div class="nav-links">
        <ul class="links">
          <li>
            <div class="search-box">
              <a href="index-search.php">
                <i class="bx bx-search"></i>
              </a>
            </div>
          </li>
          <?php
            session_start(); // Ensure session is started
            if (isset($_SESSION['companyName']) && isset($_SESSION['profileImage'])) {
              // Retrieve companyName and profileImage from session
              $companyName = $_SESSION['companyName'];
              $profileImage = $_SESSION['profileImage'];

              // Display the companyName as a link and profileImage as an image
              echo "<li><a href='../profile/profile.php#my_profile'>$companyName</a></li>";
              echo "<li style='top: 13px;'>
                      <a href='../profile/profile.php#my_profile'>
                        <img src='$profileImage' class='image-profile' alt='Profile Image'>
                      </a>
                    </li>";
            } else {
              // Fallback for anonymous users
              echo "<li><a href='../profile/profile.php#my_profile'>Combri</a></li>";
              echo "<li style='top: 13px;'>
                      <a href='../profile/profile.php#my_profile'>
                        <img src='../main_page/img/anon.jpg' class='image-profile' alt='Default Profile Image'>
                      </a>
                    </li>";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
      
  <section class="team-section">
    <div class="team-title">
        <h1>Our Team</h1>
    </div>
    <div class="team-cards">
        <div class="team-card">
            <div class="team-image">
                <img src="img/WhatsApp Image 2024-11-21 at 12.45.09.jpeg" >
            </div>
            <div class="team-detail">
                <h3>Kevin</h3>
                <p>Desingner</p>
            </div>
        </div>
        <div class="team-card">
            <div class="team-image">
                <img src="img/Cuplikan layar 2024-11-21 125310.png">
            </div>
            <div class="team-detail">
                <h3>Steven</h3>
                <p>Desingner</p>
            </div>
        </div>
        <div class="team-card">
            <div class="team-image">
                <img src="img/WhatsApp Image 2024-11-12 at 17.02.49.jpeg">
            </div>
            <div class="team-detail">
                <h3>Patrick</h3>
                <p>Desingner</p>
            </div>
        </div>
    </div>
  </section>  
  <footer class="footerContainer">
    <div class="socialIcons">
      <a href="https://github.com/Vinslol1/Project-Pemweb" aria-label="Github"><i class="fa-brands fa-github"></i></a>
      <a href="https://www.instagram.com/patrickdwangsa/" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
      <a href="https://www.youtube.com/@fasilkomtiusu" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
    </div>

    <div class="footerNav">
      <ul>
        <li><a href="../profile/profile.php#my_profile">Profile</a></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="index-about_use.php">About us</a></li>
      </ul>
    </div>

    <div class="footerBottom">
      <p>&copy; 2024 ComBri.com. All rights reserved.</p>
    </div>
  </footer>
  <script src="script.js"></script>
</body>
</html>