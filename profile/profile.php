<?php
session_start();

if (!isset($_SESSION['companyName']) || !isset($_SESSION['email']) || !isset($_SESSION['profileImage'])) {
    header("Location: index.php");
    exit();
}

$companyName = $_SESSION['companyName'];
$email = $_SESSION['email'];
$profileImage = $_SESSION['profileImage'];
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
                <img style="width: 80px; height: 80px;" src="<?php echo isset($_SESSION['profileImage']) ? $_SESSION['profileImage'] : '../main_page/img/anon.jpg'; ?>" class="image-profile">
                <?php echo "<p><br>Welcome back,<br> $companyName!</p>"; ?>
            </div>
            <br><br><br>
            <a href="#my_profile">My Profile</a>
            <a href="#">View</a>
            <a href="#">Setting</a>
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
                            <img class="image-profile" src="<?php echo isset($_SESSION['profileImage']) ? $_SESSION['profileImage'] : '../main_page/img/anon.jpg'; ?>" alt="upload img" id="upload-preview" style="width: 15vw; height: 15vw; margin-left: 30px;background-color: aliceblue; cursor: pointer;">
                        </label>
                        <input type="file" name="image" id="image" accept="image/*" style="display: none;" required>
                        <button type="submit" name="upload">Upload</button>
                    </div>
                </form>
                <br><br><br>
                <div style="display: flex; gap: 20px;" class="profile-text-container">
                    <h2>Username : </h2>
                    <div class="username">
                        <form style="display: flex;" id="profile-change" action="profile.php" method="POST">
                            <input style="height: 30px; display: none;" type="text" name="username" >
                            <?php echo "<h2>$companyName</h2>"; ?>
                            <button style="margin-left: 20px; width : 70px" id="user_button" type="button" onclick="showInput('profile-change','user_submitButton', 'user_button')">Change</button>
                            <button type="submit" id="user_submitButton" onclick="hideInput('username', 'user_submitButton', 'user_button')" style="display: none;">Done</button>
                        </form>
                    </div>
                </div>

                <div style="display: flex; gap: 20px;" class="profile-text-container">
                    <h2>Email : </h2>
                    <div class="username">
                        <form style="display: flex;" id="email-change" action="profile.php" method="POST">
                            <input style="height: 30px; display: none;" type="text" name="email" >
                            <?php echo "<h2>$email</h2>"; ?>
                            <button style="margin-left: 20px; width : 70px" id="email-button" type="button" onclick="showInput('email-change', 'email_submitButton', 'email-button')">Change</button>
                            <button type="submit" id="email_submitButton" onclick="hideInput('email', 'email_submitButton', 'email-button')" style="display: none;">Done</button>
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
