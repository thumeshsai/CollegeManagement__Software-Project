<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Delete Course</title>
<style>
body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
}

.container {
  background-color: #fff;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  width: 300px;
  text-align: center;
}

h2 {
  margin-top: 0;
  margin-bottom: 20px;
  color: #333;
}

label {
  display: block;
  margin-bottom: 10px;
  color: #333;
}

input[type="text"] {
  width: calc(100% - 20px);
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

button[type="submit"] {
  width: 100%;
  padding: 10px;
  border: none;
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
  border-radius: 5px;
  transition: background-color 0.3s;
}

button[type="submit"]:hover {
  background-color: #45a049;
}
</style>
</head>
<body>

<div class="container">
  <h2>Delete Course</h2>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="course_id">Course ID:</label>
      <input type="text" id="course_id" name="course_id" required>
      <button type="submit">Delete Course</button>
  </form>
</div>

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
    // Check if course ID is provided
    if (!empty($_POST["course_id"])) {
        // Get the course ID from the form
        $course_id = $_POST["course_id"];

        // SQL to delete a course
        $sql = "DELETE FROM courses WHERE Course_number = '$course_id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Course deleted successfully!');</script>";
        } else {
            echo "<script>alert('Error deleting course: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Course ID is required.');</script>";
    }
}

$conn->close();
?>

</body>
</html>
