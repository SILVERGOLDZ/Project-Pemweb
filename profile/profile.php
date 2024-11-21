<?php
    session_start();
    $username = "Combri";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
        $username = $_POST['username'];

        $username = htmlspecialchars($username);
        $_SESSION['username'] = $username;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../main_page/style_const.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="../main_page/nav.css">
</head>
<body>
    <nav style="background-color: black;" id="navbar" class="nav">
        <div class="navbar">
            <i class="bx bx-menu"></i>
            <div class="logo"><a href="#">ComBri</a></div>
            <div class="profile-picture"></div>
        </div>
    </nav>
    <div class="container dark-bg">
        <div class="sidenav">
            <div style="display: flex;justify-content: center; align-items: center;text-align: center; flex-direction: column;width: 100%;height: auto; min-height: 150px;">
                <img style="width: 80px; height: 80px;" src="https://i.kinja-img.com/gawker-media/image/upload/gd8ljenaeahpn0wslmlz.jpg" class="image-profile">
                <?php echo "<p><br>Welcome back,<br> $username!</p>"; ?>
            </div>
            <br><br><br>
            <a href="#my_profile">My Profile</a>
            <a href="#">View</a>
            <a href="#">Undefined</a>
            <a href="#">Undefined</a>
            <a href="#">Undefined</a>
            <a href="#">Undefined</a>
            <a href="../main_page/">Home</a>
            <a href="../user_create/user_create.php">Upload my promotion</a>
        </div>
        
        <div class="main">
            <Section id="my_profile">
                <h1>My Profile <br><br></h1>
                <br><br>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="img-upload">
                        <label for="image" class="custom-file-upload">
                            <img class="image-profile" src="../main_page/img/anon.jpg" alt="upload img" id="upload-preview" style="width: 15vw; height: 15vw; margin-left: 30px;background-color: aliceblue; cursor: pointer;">
                        </label>
                        <input type="file" name="image" id="image" accept="image/*" style="display: none;" required>
                    </div>
                </form>
                <br><br><br>
                <div style="display: flex; gap: 20px;" class="username-container">
                    <h2>Username : </h2>
                    <div class="username">

                        

                        <form style="display: flex;" id="profile-change" action="profile.php" method="POST">
                            <input style="height: 30px; display: none;" type="text" name="username" >
                            <?php   echo "<h2>$username</h2>"; ?>
                            <button style="margin-left: 20px;" id="user-button" type="button" onclick="showInput()">Change</button>
                            <button type="submit" id="submitButton" onclick="hideInput()" style="display: none;">Done</button>
                        </form>
                    </div>
                </div>
            </Section>

            <Section id="test">
        
            </Section>
        </div>
    </div>


    <script src="profile.js"></script>
</body>
</html>