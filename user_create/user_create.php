<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="user_create_style.css">
    <link rel="stylesheet" href="../main_page/style_const.css">
    <link rel="stylesheet" href="../main_page/nav.css">
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
              <li><a href="#">Profile</a></li>
              <li><a href="../main_page/index.html" >Home</a></li>
              <li><a href="index-about_use.html">About us</a></li>
              <li><a href="#">Contact us</a></li>
            </ul>
          </div>
          <div class="search-box">
            <a href="index-search.html">
              <i class="bx bx-search"></i>
            </a>
          </div>
          
        </div>
    </nav>

        <form class="upload-container" action="" method="POST" enctype="multipart/form-data">
            <div class="img-upload">
                <label for="image" class="custom-file-upload">
                    <img src="../main_page/img/upload_gambar.png" alt="upload img" id="upload-preview" style="max-width: 200px; cursor: pointer;">
                </label>
                <input type="file" name="image" id="image" accept="image/*" style="display: none;" required>
            </div>

            <div class="user-input">
                <label class="input-label" style="font-size: 20px;" for="description">Description</label>
                <br>
                <textarea name="description" placeholder="Write your description here..." required></textarea>
                <br><br>

                <label class="input-label" for="link" >Website Link (Optional)</label>
                <br>
                <input type="text" name="link" id="link" placeholder="Your website link...">
                <br>
                <button type="submit">Submit</button>
            </div>
            
        </form>

    <script src="user_create_javascript.js"></script>
    <script src="../main_page/script.js"></script>
</body>
</html>