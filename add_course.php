<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
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

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form input[type="text"],
        form input[type="date"],
        form select,
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
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
        <h2>Add Course</h2>
        <form method="post" action="add_course.php">
            <table>
                <tr>
                    <th>Course ID</th>
                    <th>Branch</th>
                    <th>Courses</th>
                </tr>
                <tr>
                    <td><input type="text" name="course_number"></td>
                    <td>
                        <select name="branch">
                            <option value="CSE">CSE</option>
                            <option value="ECE">ECE</option>
                            <option value="MECH">MECH</option>
                            <!-- Add more branches as needed -->
                        </select>
                    </td>
                    <td>
                        <select name="BRANCH">
                            <option value="Reinforcement Learning">Reinforcement Learning</option>
                            <option value="Natural Language Processing">Natural Language Processing</option>
                            <option value="Software Engineering">Software Engineering</option>
                            <option value="VLSI">VLSI</option>
                            <option value="Signal-Processing">Signal-Processing</option>
                            <option value="DigitalElectronics">DigitalElectronics</option>
                            <option value="FluidMechanics">FluidMechanics</option>
                            <option value="Engineering-Physics">Engineering-Physics</option>
                            <option value="Engineering-Diagram">Engineering-Diagram</option>
                            <!-- Add more branches as needed -->
                        </select>
                    </td>
                </tr>
            </table>
            <input type="submit" name="add_course" value="Add Course">
        </form>
    </div>
</body>

</html>

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

// Add Course
if (isset($_POST['add_course'])) {
    $course_number = $_POST['course_number'];
    $branch = $_POST['branch'];
    $course_name = $_POST['BRANCH']; // Course name from the second select input

    $sql = "INSERT INTO courses (Course_number, branch, Course_name) VALUES ('$course_number', '$branch', '$course_name')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Course added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
}

$conn->close();
?>