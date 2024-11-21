<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--rating-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="nav.css">
    <link href="style-search.css" rel="stylesheet" />

  </head>
  <body> 
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
            <li><a href="index.php" >Home</a></li>
            <li><a href="index-about_use.php">About us</a></li>
            <li><a href="#">Contact us</a></li>
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
              session_start();
              if (isset($_SESSION['username'])) {
                $username = $_SESSION['username']; 
                echo "<li><a href='../profile/profile.php'>$username</a></li>";
              } else {
                  echo "<li><a href='../profile/profile.php'>Combri</a></li>";
              }
            ?>
            <li style="top: 13px;"><a href="../profile/profile.php#my_profile"><img src="https://i.kinja-img.com/gawker-media/image/upload/gd8ljenaeahpn0wslmlz.jpg" class="image-profile"></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="s003">
      <form>
        <div class="tags-container">
          <span class="tag" data-value="Technology">Technology</span>
          <span class="tag" data-value="Health">Health</span>
          <span class="tag" data-value="Science">Science</span>
          <span class="tag" data-value="Travel">Travel</span>
          <span class="tag" data-value="Education">Education</span>
          <span class="tag" data-value="Technology">Laptops</span>
          <span class="tag" data-value="Health">Tablets</span>
          <span class="tag" data-value="Science">Iphone</span>
          <span class="tag" data-value="Travel">TV</span>
          <span class="tag" data-value="Education">Car</span>          <span class="tag" data-value="Technology">Technology</span>
          <span class="tag" data-value="Health">Bike</span>
          <span class="tag" data-value="Science">Football</span>
          <span class="tag" data-value="Travel">Smartphones</span>
          <span class="tag" data-value="Education">Market</span>          <span class="tag" data-value="Technology">Technology</span>
          <span class="tag" data-value="Health">Foods</span>
          <span class="tag" data-value="Science">Snacks</span>
          <span class="tag" data-value="Travel">Drinks</span>
          <span class="tag" data-value="Education">Car</span>          <span class="tag" data-value="Technology">Technology</span>
          <span class="tag" data-value="Health">Sweets</span>
          <span class="tag" data-value="Science">planks</span>
          <span class="tag" data-value="Travel">shirts</span>
          <span class="tag" data-value="Education">wears</span>          <span class="tag" data-value="Technology">Technology</span>
          <span class="tag" data-value="Health">Hat</span>
          <span class="tag" data-value="Science">Knives</span>
          <span class="tag" data-value="Travel">Sports</span>
          <span class="tag" data-value="Education">Health</span>
        </div>
        <div class="inner-form">
          <div class="input-field second-wrap">
            <input id="search" type="text" placeholder="Enter Keywords?" />
          </div>
              <div class="input-field third-wrap">
                <button class="btn-search" type="button">
                  <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                  </svg>
                </button>
              </div>
          </div>

      </form>
    </div>

  <!-- Footer -->
  <footer class="footerContainer">
      <div class="socialIcons">
        <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
        <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
        <a href="#" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
        <a href="#" aria-label="Google Plus"><i class="fa-brands fa-google-plus"></i></a>
        <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
      </div>

      <div class="footerNav">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">News</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Our Team</a></li>
        </ul>
      </div>

      <div class="footerBottom">
        <p>&copy; 2024 ComBri.com. All rights reserved.</p>
      </div>
    </footer>
    <script src="scirpt-search.js"></script>
    <script src="script.js"></script>
  </body>
</html>
