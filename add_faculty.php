<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Faculty</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            width: 150px;
        }

        input[type="text"] {
            width: calc(100% - 150px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .back-btn {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Faculty</h2>
        <form method="post" action="add_faculty.php">
            <table>
                <tr>
                    <th><label for="name">Name:</label></th>
                    <td><input type="text" id="name" name="name" required></td>
                </tr>
                <tr>
                    <th><label for="subject">Subject:</label></th>
                    <td><input type="text" id="subject" name="subject" required></td>
                </tr>
            </table>
            <input type="submit" value="Add Faculty">
        </form>
        <a href="dashboard.php" class="back-btn">Back to Dashboard</a>
    </div>

    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if both name and subject are provided
        if (!empty($_POST['name']) && !empty($_POST['subject'])) {
            // Get form data
            $name = $_POST['name'];
            $subject = $_POST['subject'];

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

            // Insert faculty into database
            $sql = "INSERT INTO faculty (name, subject) VALUES ('$name', '$subject')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Faculty added successfully');</script>";
            } else {
                echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
            }

            // Close connection
            $conn->close();
        } else {
            // Display error message if name or subject is missing
            echo "<script>alert('Please enter both name and subject.');</script>";
        }
    }
    ?>
</body>
</html>
