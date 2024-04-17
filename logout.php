<?php
// Start the session
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Logout logic
if (isset($_GET['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Include your CSS files here -->
    <style>
        #logout {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer; /* add cursor pointer to indicate clickable */
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#logout').click(function(e) {
                e.preventDefault();
                $.get('dashboard.php?logout=true', function(response) {
                    // Redirect to login page
                    window.location.href = 'login.php';
                });
            });
        });
    </script>
</head>
<body>

<div id="logout">
    <img src="logout_icon.png" alt="Logout" width="20" height="20"> <!-- Adjust width and height as needed -->
</div>

<div id="dashboard-content">
    <!-- Your dashboard content goes here -->
    <h1>Welcome to the Dashboard!</h1>
    <p>This is where your dashboard content would be displayed.</p>
</div>

</body>
</html>
