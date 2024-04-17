<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
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

        form input[type="text"],
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="submit"] {
            background-color: #dc3545;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none; /* Added */
        }

        form input[type="submit"]:hover {
            background-color: #c82333;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-top: 10px; /* Added */
            display: block; /* Added */
            text-align: center; 
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
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

            // SQL to delete a student
            $sql = "DELETE FROM students WHERE id = $id";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Student deleted successfully!');</script>";
            } else {
                echo "<script>alert('Error deleting student: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('ID is required.');</script>";
        }
    }

    // Close connection
    $conn->close();
    ?>

    <div class="container">
        <h2>Delete Student</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id">
            <button type="submit" class="delete-button">Delete Student</button>
        </form>

        <a href="dashboard.php" class="back-button">Back to Dashboard</a>
    </div>

</body>

</html>
