<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Faculty Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: grid;
            grid-gap: 10px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .back-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-top: 20px;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
        .back-btn span {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Faculty Information</h2>
        <form method="post" action="">
            <label for="faculty_id">Faculty ID:</label>
            <input type="text" id="faculty_id" name="faculty_id">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject">
            <input type="submit" name="edit_faculty" value="Edit Faculty">
        </form>
        <a href="dashboard.php" class="back-btn"><span>&#8592;</span> Back to Dashboard</a>
    </div>
</body>
</html>

<?php
if(isset($_POST['edit_faculty'])) {
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
    $faculty_id = $_POST['faculty_id'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];

    // Perform database update
    $sql = "UPDATE faculty SET name='$name', subject='$subject' WHERE id=$faculty_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Faculty information updated successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }

    // Close connection
    $conn->close();
}
?>
