<?php
session_start();

// If user is not logged in, redirect to login page
if (!isset($_SESSION['companyName']) || !isset($_SESSION['email']) || !isset($_SESSION['profileImage'])) {
    header("Location: index.php");
    exit();
}

// Retrieve session data
$companyName = $_SESSION['companyName'];
$email = $_SESSION['email'];
$profileImage = $_SESSION['profileImage'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="../main_page/style_const.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="../main_page/nav.css">
    <script type="module">
        import { createClient } from 'https://cdn.jsdelivr.net/npm/@supabase/supabase-js/+esm';

        const supabaseUrl = 'https://kfkqpjzxvkbdnhrxlnbr.supabase.co';
        const supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imtma3Fwanp4dmtiZG5ocnhsbmJyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MzI4MDA4ODYsImV4cCI6MjA0ODM3Njg4Nn0.rvvbHheEXnHG8pPrJ-9AH7yxYkhnojcSpQoOIzJHDM0';
        const supabase = createClient(supabaseUrl, supabaseKey);

        async function handleUpdateProfile(field, value) {
            const companyName = '<?php echo $companyName; ?>';
            const email = '<?php echo $email; ?>';

            const updates = {};
            updates[field] = value;

            try {
                const { data, error } = await supabase
                    .from('log_in')
                    .update(updates)
                    .eq('email', email); // We use the email to uniquely identify the user

                if (error) {
                    console.error('Error updating profile:', error);
                    alert('Failed to update profile.');
                } else {
                    console.log('Profile updated successfully:', data);
                    // Update session data on the client side (useful for keeping the session updated)
                    if (field === 'companyName') {
                        window.location.reload(); // Reload page to reflect updated company name
                    }
                    alert('Profile updated successfully!');
                }
            } catch (error) {
                console.error('Unexpected error:', error);
                alert('Error updating profile.');
            }
        }

        // Trigger update when form is submitted
        document.addEventListener('DOMContentLoaded', () => {
            const companyNameForm = document.querySelector('#companyNameForm');
            const emailForm = document.querySelector('#emailForm');

            companyNameForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const newCompanyName = e.target.elements['companyName'].value;
                handleUpdateProfile('companyName', newCompanyName);
            });

            emailForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const newEmail = e.target.elements['email'].value;
                handleUpdateProfile('email', newEmail);
            });
        });
    </script>
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
            <div style="display: flex; justify-content: center; align-items: center; text-align: center; flex-direction: column; width: 100%; height: auto; min-height: 150px;">
                <img style="width: 80px; height: 80px;" src="<?php echo isset($_SESSION['profileImage']) ? $_SESSION['profileImage'] : '../main_page/img/anon.jpg'; ?>" class="image-profile">
                <?php echo "<p><br>Welcome back,<br> $companyName!</p>"; ?>
            </div>
            <br><br><br>
            <a href="#my_profile">My Profile</a>
            <a href="../main_page/">Home</a>
            <a href="../user_create/user_create.php">Upload my promotion</a>
        </div>
        
        <div class="main">
            <Section id="my_profile">
                <h1>My Profile <br><br></h1>
                <br><br>

                <!-- Profile update form -->
                <form action="profile.php" method="POST" enctype="multipart/form-data">
                    <div class="img-upload">
                        <label for="image" class="custom-file-upload">
                            <img class="image-profile" src="<?php echo isset($_SESSION['profileImage']) ? $_SESSION['profileImage'] : '../main_page/img/anon.jpg'; ?>" alt="upload img" id="upload-preview" style="width: 15vw; height: 15vw; margin-left: 30px; background-color: aliceblue; cursor: pointer;">
                        </label>
                        <input type="file" name="image" id="image" accept="image/*" style="display: none;" required>
                    </div>
                </form>
                <br><br><br>

                <!-- Company Name change -->
                <div style="display: flex; gap: 20px;" class="profile-text-container">
                    <h2>Company Name: </h2>
                    <div class="username">
                        <form id="companyNameForm" style="display: flex;">
                            <input type="text" name="companyName" value="<?php echo $companyName; ?>" style="height: 30px;">
                        </form>
                    </div>
                </div>

                <!-- Email change -->
                <div style="display: flex; gap: 20px;" class="profile-text-container">
                    <h2>Email: </h2>
                    <div class="username">
                        <form id="emailForm" style="display: flex;">
                            <input type="text" name="email" value="<?php echo $email; ?>" style="height: 30px;">
                        </form>
                    </div>
                </div>
            </Section>
        </div>
    </div>

    <script src="profile.js"></script>
</body>
</html>
