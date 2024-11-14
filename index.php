<?php
    $connection = pg_connect("host = localhost dbname = MAHASISWA user = postgres password=@13579@08642@@");
    if (!$connection) {
        echo "EROR";
        exit;
    }

    $result = pg_query($connection, "SELECT * from MAHASISWA");
    if (!$result){
        echo "ERORRRRRRRRRRRRRR!";
        exit;
    }

    $test = pg_fetch_row($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="log.css">
</head>
<body>

    <div class="container">
        <h2>Login</h2>
        <form action="/login" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <a href="button.html">
                <button type="button">login</button>        
        </form>
        <div class="register-link">
            <p>Don't have an account? <a href="reg.html">Register here</a></p>
        </div>
        
    </div>

</body>
</html>