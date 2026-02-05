<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        
        .logout-container {
            background-color: white;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
        }
        
        .logout-icon {
            font-size: 60px;
            color: #28a745;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <div class="logout-icon">✓</div>
        <h2>Logged Out Successfully</h2>
        <p class="text-muted">You have been logged out from the Student Portal</p>
        <p>Your session and cookies have been cleared.</p>
        <a href="index.html" class="btn btn-primary mt-3">Return to Home</a>
        <a href="registration.php" class="btn btn-secondary mt-3">Login Again</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// PHP Backend - Logout Handler

// Start session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Delete cookies
if (isset($_COOKIE['student_name'])) {
    setcookie('student_name', '', time() - 3600, '/');
}

if (isset($_COOKIE['student_id'])) {
    setcookie('student_id', '', time() - 3600, '/');
}

// Redirect will happen after showing the logout message
// In a real application, you might want to redirect immediately:
// header('Location: index.html');
// exit();
?>