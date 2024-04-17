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

            // Retrieve and display faculty members
            $sql = "SELECT id, name, subject FROM faculty";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["subject"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No faculty members found</td></tr>";
            }

            $conn->close();
            ?>
        </table>
        <a href="dashboard.php" class="back-btn"><span>&#8592;</span> Back to Dashboard</a>
    </div>
</body>
</html>
