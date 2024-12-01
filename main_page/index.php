<?php include '../conn.php'?>
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
    <link rel="stylesheet" href="style_const.css">
    <link rel="stylesheet" href="nav.css">

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
      <img class="notice_img" src="img/NOTICE_1_example.jpg"  alt="" height="40vh">
      <img class="notice_img" src="img/NOTICE_2_example.webp" alt="" height="40vh">
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

        <?php
          // Dynamic query mengambil category tertentu
          $query = "
            SELECT DISTINCT 
              SPLIT_PART(unique_id, '102', 2) AS category
            FROM posters";

          $stmt = $pdo->prepare($query);
          $stmt->execute();
          $categories = $stmt->fetch(PDO::FETCH_COLUMN);  //ambil data ke bawah

          $allPosters = [];

          foreach ($categories as $category) {
            // membuat tabel berdasarkan kategory
            $query = "SELECT * FROM posters WHERE unique_id LIKE :search";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':search' => "%102{$category}%"]);
            $posters = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // data setiap poster berdasarkan kategory
            $allPosters[$category] = $posters;
          }
        ?>

        <script>
          let allPosters = <?php echo json_encode($allPosters); ?>;
          let categories = Object.keys(allPosters); 

          const companyNameClass = document.querySelector(".companyName-cardSelector");

          function autoAddCard() {
            categories.forEach(category => {
              let sectionHtml = `
                <h1>${category}</h1>
                <div class="card-overflow" id="${category}">`;

              if (allPosters[category]) {
                allPosters[category].forEach((poster, j) => {
                  sectionHtml += `
                    <div class="card">
                      <div class="card-image" style="background-image: url('${poster.poster_img}');"></div>
                      <div class="card-content">
                        <h3>${poster.company_name} 
                          <p style="float: inline-end; font-size: small;" class="description">20</p>
                        </h3>
                        <p class="description">Views: 0</p>

                        <div class="stars">
                            <span class="fa fa-star bintang-rating" id="${category}00${j}-ST1"></span>
                            <span class="fa fa-star bintang-rating" id="${category}00${j}-ST2"></span>
                            <span class="fa fa-star bintang-rating" id="${category}00${j}-ST3"></span>
                            <span class="fa fa-star bintang-rating" id="${category}00${j}-ST4"></span>
                            <span class="fa fa-star bintang-rating" id="${category}00${j}-ST5"></span>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button class="button">
                          &rarr;
                        </button>
                      </div>
                    </div>`;
                });
              }

              sectionHtml += `</div>`;
              companyNameClass.innerHTML += sectionHtml; 
            });

            star_responsive();
          }
          autoAddCard();
        </script>
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
    
  <script src="script.js"></script>
</body>
</html>