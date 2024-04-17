<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Information</title>
    <style>
        button {
            height: 35px;
            background-color: grey;
            border: none;
            border-radius: 5px;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: grey;
            border: none;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .back-button:hover {
            background-color: darkgrey;
        }

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

        form input[type="text"],
        form input[type="date"],
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Add Student Information</h2>
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob">
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address">
            <input type="submit" name="add_student" value="Add Student">
            <a href="dashboard.php" class="back-button">Back to Dashboard</a>
        </form>
    </div>
</body>

</html>


<?php
if (isset($_POST['add_student'])) {
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
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    // Perform database insert
    $sql = "INSERT INTO students (name, dob, contact, address) VALUES ('$name', '$dob', '$contact', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Student added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }

    // Close connection
    $conn->close();
}
?>