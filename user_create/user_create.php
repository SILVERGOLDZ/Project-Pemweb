<?php
define('DB_HOST', 'aws-0-ap-southeast-1.pooler.supabase.com');  //host
define('DB_PORT', '6543'); //port
define('DB_NAME', 'postgres');  //default
define('DB_USER', 'postgres.kfkqpjzxvkbdnhrxlnbr'); //user
define('DB_PASS', '08236611180aA'); //password

try {
    $dsn = "pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>


<?php
$SUPABASE_URL = "https://kfkqpjzxvkbdnhrxlnbr.supabase.co"; // Replace with your Supabase URL
$SUPABASE_API_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imtma3Fwanp4dmtiZG5ocnhsbmJyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MzI4MDA4ODYsImV4cCI6MjA0ODM3Njg4Nn0.rvvbHheEXnHG8pPrJ-9AH7yxYkhnojcSpQoOIzJHDM0"; // Replace with your Supabase API key
$BUCKET_NAME = "img"; // Replace with your bucket name

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    var_dump($_FILES);

    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        die("Error with file upload: " . $_FILES['image']['error']);
    }

    // Validate file type and size
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($_FILES['image']['type'], $allowedTypes)) {
        die("Invalid file type. Only JPG, PNG, and GIF files are allowed.");
    }


    // File variables
    $filePath = $_FILES['image']['tmp_name'];
    $fileName = basename($_FILES['image']['name']);

    if (!file_exists($filePath)) {
        die("Uploaded file not found at temporary location.");
    }
    
    // Upload to Supabase Storage
    $url = "$SUPABASE_URL/storage/v1/object/$BUCKET_NAME/$fileName";
    $fileContent = file_get_contents($filePath);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fileContent);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $SUPABASE_API_KEY",
        "Content-Type: application/octet-stream",
        "x-upsert: true"
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $imageURL = "$SUPABASE_URL/storage/v1/object/public/$BUCKET_NAME/$fileName";
        
        // Insert data into the database
        $stmt = $pdo->prepare('INSERT INTO poster (unique_id, "companyName", "posterImage", title, description, rating) 
        VALUES (:unique_id, :companyName, :poster, :title, :description, :rating)');        
        $unique_id = 'default'; // Nilai unik untuk kolom unique_id
        $companyName = 'Combri'; // Nama perusahaan
        $rating = '5.0'; // Rating default
        
        $stmt->bindParam(':unique_id', $unique_id);
        $stmt->bindParam(':companyName', $companyName);
        $stmt->bindParam(':poster', $imageURL);
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':rating', $rating);
        
        try {
          $stmt->execute();
          echo "Data berhasil dimasukkan ke database!";
      } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
    
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $SUPABASE_URL);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    
    curl_close($ch);
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

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
              <label class="input-label" for="link" >Title</label>
                <br><br>
                <input type="text" name="title" id="link" placeholder="Your company name (suggested!)">
                <br>
                <label class="input-label" style="font-size: 20px;" for="description">Description</label>
                <br>
                <textarea name="description" placeholder="Write your description here..." required></textarea>
                <br><br>
                <button type="submit">Submit</button>
            </div>
            
        </form>

    <script src="user_create_javascript.js"></script>
    <script src="../main_page/script.js"></script>
</body>
</html>