<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="log.css">
    <script type="module">
        import { createClient } from 'https://cdn.jsdelivr.net/npm/@supabase/supabase-js/+esm';

        const supabaseUrl = 'https://kfkqpjzxvkbdnhrxlnbr.supabase.co';
        const supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imtma3Fwanp4dmtiZG5ocnhsbmJyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MzI4MDA4ODYsImV4cCI6MjA0ODM3Njg4Nn0.rvvbHheEXnHG8pPrJ-9AH7yxYkhnojcSpQoOIzJHDM0'; // Replace with your actual public anon key
; // Replace with your actual key
        const supabase = createClient(supabaseUrl, supabaseKey);

        async function handleLogin(event) {
            event.preventDefault(); // Prevent page reload

            console.log('Login function triggered');

            const companyName = document.querySelector('#companyName').value;
            const password = document.querySelector('#password').value;

            console.log(`Company Name: ${companyName}, Password: ${password}`);

            try {
                const { data, error } = await supabase
                    .from('log_in') // Replace with your actual table name
                    .select('*')
                    .ilike('companyName', companyName);

                console.log('Supabase response:', data, error);
                

                if (error) {
                    console.error('Error fetching data:', error);
                    alert('Login error. Please try again.');
                    return;
                }

                if (data.length === 0) {
                    alert('Company not found');
                } else {
                    const user = data[0];
                    if (user.password === password) {
                        alert('Login successful!');
                        window.location.href = 'main_page/index.php'; // Redirect on success
                    } else {
                        alert('Incorrect password');
                    }
                }
            } catch (err) {
                console.error('Unexpected error:', err);
                alert('An unexpected error occurred. Please try again.');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('#loginForm');
            form.addEventListener('submit', handleLogin);
            console.log('Event listener attached to form');
        });
    </script>
</head>
<body>

    <div class="container">
        <h2>Login</h2>
        <form id="loginForm">
            <label for="companyName">Company Name:</label>
            <input type="text" name="companyName" id="companyName" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        
        <div class="register-link">
            <p>Don't have an account? <a href="conn.php">Register here</a></p>
        </div>
    </div>

</body>
</html>
