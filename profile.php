<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

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

// Retrieve username from session
$username = $_SESSION['username'];

// Perform database query to fetch user details
$sql = "SELECT * FROM students WHERE name = '$username'";
$result = $conn->query($sql);

// Check if user details exist
if ($result && $result->num_rows > 0) {
    // Fetch user details
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $dob = $row['dob'];
    $contact = $row['contact'];
    $address = $row['address'];
} else {
    // User details not found
    $name = "N/A";
    $dob = "N/A";
    $contact = "N/A";
    $address = "N/A";
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<div class="w3-container">
  <h2>Profile Information</h2>
  <table class="w3-table w3-striped">
    <tr>
      <td><strong>Name:</strong></td>
      <td><?php echo $name; ?></td>
    </tr>
    <tr>
      <td><strong>Date of Birth:</strong></td>
      <td><?php echo $dob; ?></td>
    </tr>
    <tr>
      <td><strong>Contact:</strong></td>
      <td><?php echo $contact; ?></td>
    </tr>
    <tr>
      <td><strong>Address:</strong></td>
      <td><?php echo $address; ?></td>
    </tr>
  </table>
</div>

</body>
</html>
