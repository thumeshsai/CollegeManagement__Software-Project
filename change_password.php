<?php
// Session start and user authentication logic here

// Handle form submission to change password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle changing password in the database
    // Redirect to view_profile.php after changing password
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>
<body>
    <h2>Change Password</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>New Password:</label>
        <input type="password" name="new_password" required><br><br>
        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required><br><br>
        <input type="submit" value="Change Password">
    </form>
</body>
</html>
