<?php
// Start the session
session_start();

// Define the valid username and password
$valid_username = "admin";
$valid_password = "admin";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both username and password are provided
    if (!empty($_POST['first']) && !empty($_POST['password'])) {
        // Check if username and password are correct
        if ($_POST['first'] === $valid_username && $_POST['password'] === $valid_password) {
            // Authentication successful, redirect to dashboard
            $_SESSION['username'] = $_POST['first'];
            header("Location: dashboard.php");
            exit();
        } else {
            // Authentication failed, display error message
            $error_message = "Invalid username or password.";
        }
    } else {
        // Username or password is missing, display error message
        $error_message = "Please enter both username and password.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="main">
        <h1>College</h1>
        <h3>Enter your login credentials</h3>
        <?php if (isset($error_message)) { ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="first">
                Username:
            </label>
            <input type="text" id="first" name="first" placeholder="Enter your Username" required>

            <label for="password">
                Password:
            </label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>

            <div class="wrap">
                <button type="submit">
                    Login
                </button>
            </div>
        </form>
    </div>
</body>

</html>
