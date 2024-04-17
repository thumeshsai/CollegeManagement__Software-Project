<?php
// Start the session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both username and password are provided
    if (!empty($_POST['first']) && !empty($_POST['password'])) {
        // Database connection
        $servername = "127.0.0.1:4306";
        $username = "root";
        $password = "";
        $dbname = "course_management";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve form data
        $name = $_POST['first'];
        $dob = $_POST['password'];

        // Perform database query to check if the details are present in the students table
        $sql = "SELECT * FROM students WHERE name = '$name' AND dob = '$dob'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            // Authentication successful, set session and redirect to dashboard
            $_SESSION['username'] = $name;
            header("Location: user_dashboard1.php");
            exit();
        } else {
            // Authentication failed, display error message
            $error_message = "Invalid username or date of birth.";
        }

        // Close connection
        $conn->close();
    } else {
        // Username or date of birth is missing, display error message
        $error_message = "Please enter both username and date of birth.";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>User Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="main">
        <h1>College</h1>
        <h3>Enter your User login credentials</h3>
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
            <input type="date" id="password" name="password" required>

            <div class="wrap">
                <button type="submit">
                    Login
                </button>
            </div>
        </form>
        <a href="forgot_password.html" style="text-decoration: none;"> <!-- Link to the forgot password page -->
            Forgot Password?
        </a>
    </div>
</body>

</html>
