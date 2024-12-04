<?php include '../../conn.php';

  
if (isset($_GET['poster_img_catch'], $_GET['category'])) {
  $poster_img = filter_input(INPUT_GET, 'poster_img_catch', FILTER_SANITIZE_STRING);
  $poster_category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);
  $_SESSION['poster_img_catch'] = $poster_img;
  $_SESSION['category'] = $poster_category;
} else {
  die("Required parameters not provided.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combri</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--rating-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../style_const.css">
    <link rel="stylesheet" href="../nav.css">

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
          <li><a href="../../profile/profile.php#my_profile">Profile</a></li>
          <li><a href="../index.php" >Home</a></li>
          <li><a href="../index-about_use.php">About us</a></li>
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
<li style="top: 13px;">
  <a href="../profile/profile.php#my_profile">
    <img src="https://i.kinja-img.com/gawker-media/image/upload/gd8ljenaeahpn0wslmlz.jpg" class="image-profile">
  </a>
</li>
        </ul>
      </div>
    </div>
  </nav>
  
  
    <div class="notice">
      <img class="notice_img" src="<?php echo $poster_img ?>"  alt="" height="40vh" style="background-color:white;">
      <script src="notice_script.js"></script>
    </div>
    
  <div class="category">
    <div class="category-chooser">
      <button onclick="categoryOnClick()" style="margin-left: 0px;" class="kategori dark-bg">Trending</button>
      <button onclick="categoryOnClick()" class="kategori dark-bg">Top Rated</button>
      <button onclick="categoryOnClick()" class="kategori dark-bg">Most Viewed</button>
    </div>

    <div class="card-section dark-bg">
      <section class="companyName-cardSelector">
        <div class="card-overflow" id="${poster.company_name}">

        <?php
          // membuat tabel berdasarkan kategory
          $query = "SELECT * FROM posters WHERE company_name LIKE :search";
          $stmt = $pdo->prepare($query);
          $stmt->execute([':search' => "%$poster_category%"]);
          $posters = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <script>
          const posters = <?php echo json_encode($posters); ?>;
          let categories = Object.keys(posters); 

          const companyNameClass = document.querySelector(".card-overflow");

          function autoAddCard() {
            posters.forEach((poster, index) => {
              let sectionHtml = `
                <a href="company_view.php?poster_img_catch=${encodeURIComponent(poster.poster_img)}&category=${encodeURIComponent(poster.company_name)}" class="card">`;

                sectionHtml += `
                  <div class="card-image" style="background-image: url('${poster.poster_img}');"></div>
                  <div class="card-content">
                    <h3>${poster.company_name}</h3>
                    <p class="description">Views: 0</p>
                    <div class="stars">
                      <span class="fa fa-star bintang-rating" id="${poster.company_name}00${index}-ST1"></span>
                      <span class="fa fa-star bintang-rating" id="${poster.company_name}00${index}-ST2"></span>
                      <span class="fa fa-star bintang-rating" id="${poster.company_name}00${index}-ST3"></span>
                      <span class="fa fa-star bintang-rating" id="${poster.company_name}00${index}-ST4"></span>
                      <span class="fa fa-star bintang-rating" id="${poster.company_name}00${index}-ST5"></span>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button class="button">
                      &rarr;
                    </button>
                  </div>`;

              sectionHtml += `</a>`;
              companyNameClass.innerHTML += sectionHtml;
            });

            star_responsive();
          }
          autoAddCard();
        </script>
        </div>
      </section>
    </div>
  </div>

<!-- Footer -->
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
    
  <script src="../script.js"></script>
</body>
</html>