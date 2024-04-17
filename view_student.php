<!DOCTYPE html>
<html>

<head>
    <title>View Student Details</title>
    <style>
        /* Styles for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #009879;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        tr:hover {
            background-color: #e6f2ff;
        }

        /* Styles for responsiveness */
        @media only screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table caption {
                font-size: 1.3em;
            }

            table thead {
                display: none;
            }

            table tr {
                margin-bottom: 20px;
                display: block;
                border-bottom: 2px solid #ddd;
            }

            table td {
                display: block;
                text-align: right;
                font-size: 13px;
                border-bottom: 1px dotted #ccc;
            }

            table td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
            }
        }
    </style>
</head>

<body> <?php // Database connection
        $servername = "127.0.0.1:4306";
        $username = "root";
        $password = "";
        $dbname = "course_management";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Perform database query to retrieve student details
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);

        echo "<div style='overflow-x:auto;'>";
        echo "<table>";
        echo "<thead><tr><th>ID</th><th>Name</th><th>Date of Birth</th><th>Contact</th><th>Address</th></tr></thead>";
        echo "<tbody>";
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td data-label='ID'>" . $row["id"] . "</td>";
                echo "<td data-label='Name'>" . $row["name"] . "</td>";
                echo "<td data-label='Date of Birth'>" . $row["dob"] . "</td>";
                echo "<td data-label='Contact'>" . $row["contact"] . "</td>";
                echo "<td data-label='Address'>" . $row["address"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>0 results</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

        // Close connection
        $conn->close();
        ?>
</body>

</html>