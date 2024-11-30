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

    if (!isset($_FILES['profileImage']) || $_FILES['profileImage']['error'] !== UPLOAD_ERR_OK) {
        die("Error with file upload: " . $_FILES['profileImage']['error']);
    }

    // Validate file type and size
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($_FILES['profileImage']['type'], $allowedTypes)) {
        die("Invalid file type. Only JPG, PNG, and GIF files are allowed.");
    }


    // File variables
    $filePath = $_FILES['profileImage']['tmp_name'];
    $fileName = basename($_FILES['profileImage']['name']);

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

        $profileImageURL = "$SUPABASE_URL/storage/v1/object/public/$BUCKET_NAME/$fileName";
        
        // Insert data into the database
        $stmt = $pdo->prepare("INSERT INTO log_in(companyName, email, password, profileImage) VALUES (:companyName, :email, :password, :profileImage)");
        $stmt->bindParam(':companyName', $_POST['companyName']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':password', $_POST['password']);
        $stmt->bindParam(':profileImage', $profileImageURL);
        
        $stmt->execute();
        
        echo "Manager added successfully with profile image!";

    
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
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
    <label for="companyName">Company Name:</label>
    <input type="text" name="companyName" id="companyName" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    
    <label for="profileImage">Profile Image:</label>
    <input type="file" name="profileImage" id="profileImage" accept="image/*" required>
    
    <button type="submit">Upload</button>
</form>
<?php
    $managers = [];
    try {
        $stmt = $pdo->query("SELECT * FROM log_in ORDER BY id");
        $managers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $message = "Error fetching data: " . $e->getMessage();
    }
?>
<?php if(!empty($managers)) : ?>
              <?php foreach($managers as $manager): ?>
                      <tr>
                          <td><?php echo htmlspecialchars($manager['id']); ?></td>
                          <td><?php echo htmlspecialchars($manager['companyName']); ?></td>
                          <td><?php echo htmlspecialchars($manager['password']); ?></td>
                          <td><?php echo htmlspecialchars($manager['email']); ?></td>
                          <td><img style="width: 100px;height: 100px;" src="<?php echo $manager['profileImage']?>" alt="gambar"></td>
                          <td>
                              <button class="btn btn-danger btn-sm">Delete</button>
                          </td>
                      </tr>
                  <?php endforeach; ?>
<?php endif;?>
</body>
</html>