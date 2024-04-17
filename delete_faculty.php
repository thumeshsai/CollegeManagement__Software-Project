<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Faculty</title>
</head>
<body>

<?php
// Database connection
$servername = "127.0.0.1:4306";
$username = "root";
$password = "";
$database = "course_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if ID is provided
    if (!empty($_POST["id"])) {
        // Get the ID from the form
        $id = $_POST["id"];

        // SQL to delete a faculty member
        $sql = "DELETE FROM faculty WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Faculty member deleted successfully!');</script>";
        } else {
            echo "<script>alert('Error deleting faculty member: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('ID is required.');</script>";
    }
}

// Close connection
$conn->close();
?>

<h2>Delete Faculty</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="id">ID:</label>
    <input type="text" id="id" name="id">
    <button type="submit">Delete Faculty</button>
</form>

</body>
</html>
