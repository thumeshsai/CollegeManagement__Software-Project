<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Faculty</title>
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
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>View Faculty</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Subject</th>
            </tr>
            <?php
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

            // Retrieve and display courses
            $sql = "SELECT id, name, subject FROM faculty"; // Adjusted column names here
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>"; // Adjusted column name here
                    echo "<td>" . $row["name"] . "</td>"; // Adjusted column name here
                    echo "<td>" . $row["subject"] . "</td>"; // Adjusted column name here
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No Faculty found</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
