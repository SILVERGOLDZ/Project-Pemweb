<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="log.css">
    <script type="module">
        import { createClient } from 'https://cdn.jsdelivr.net/npm/@supabase/supabase-js/+esm';

        // Supabase Configuration
        const supabaseUrl = 'https://kfkqpjzxvkbdnhrxlnbr.supabase.co';
        const supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imtma3Fwanp4dmtiZG5ocnhsbmJyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MzI4MDA4ODYsImV4cCI6MjA0ODM3Njg4Nn0.rvvbHheEXnHG8pPrJ-9AH7yxYkhnojcSpQoOIzJHDM0';
        const supabase = createClient(supabaseUrl, supabaseKey);

        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('#loginForm');

            // Attach the login event listener
            form.addEventListener('submit', handleLogin);

            async function handleLogin(event) {
                event.preventDefault(); // Prevent form submission

                const companyName = document.querySelector('#companyName').value;
                const password = document.querySelector('#password').value;

                try {
                    // Query Supabase for matching companyName
                    const { data, error } = await supabase
                        .from('log_in') // Replace with your table name
                        .select('companyName, email, password, profileImage')
                        .eq('companyName', companyName);

                    if (error) {
                        console.error('Error fetching data:', error);
                        alert('Login error. Please try again.');
                        return;
                    }

                    if (data.length === 0) {
                        alert('Company not found.');
                        return;
                    }

                    const user = data[0]; // Get the first matching user

                    // Check if the password matches
                    if (user.password === password) {
                        alert('Login successful!');

                        // Send data to PHP for session initialization
                        const sessionData = {
                            companyName: user.companyName,
                            email: user.email,
                            profileImage: user.profileImage,
                        };

                        fetch('loghandler.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(sessionData),
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    window.location.href = 'main_page/index.php'; // Redirect to profile page
                                } else {
                                    alert('Failed to initialize session.');
                                }
                            })
                            .catch(error => {
                                console.error('Error initializing session:', error);
                            });
                    } else {
                        alert('Incorrect password.');
                    }
                } catch (err) {
                    console.error('Unexpected error:', err);
                    alert('An unexpected error occurred. Please try again.');
                }
            }
        });
    </script>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form id="loginForm" method="POST" action="login.php">
            <label for="companyName">Company Name:</label>
            <input type="text" name="companyName" id="companyName" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <div class="register-link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>

        <!-- Continue as Guest Button -->
        <div class="guest-login">
            <form method="POST" action="main_page/index.php">
                <button type="submit" name="guest" style="background-color: grey; color: white; border: none; padding: 10px 20px; margin-top: 10px; cursor: pointer;">Continue as Guest</button>
            </form>
        </div>
    </div>
</body>
</html>
