<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Dashboard</title>
  <style>
    #admin {
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-image: url('lecturer.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .dashboard {
      display: flex;
      height: 100vh;
    }

    .sidebar {
      width: 250px;
      background-color: rgba(29, 29, 29, 0.8);
      padding: 20px;
      transition: width 0.3s ease;
    }

    .sidebar.collapsed {
      width: 60px;
    }

    .sidebar h2 {
      margin-bottom: 20px;
      font-size: 20px;
      font-weight: bold;
      color: #fff;
    }

    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }

    .sidebar ul li {
      margin-bottom: 10px;
    }

    .sidebar ul li a {
      display: block;
      padding: 10px;
      text-decoration: none;
      color: #fff;
      background-color: #2196F3;
      border-radius: 5px;
    }

    .sidebar ul li a:hover {
      background-color: #0b7dda;
    }

    .sidebar ul ul {
      display: none;
      padding-left: 20px;
    }

    .sidebar ul ul.active {
      display: block;
    }

    .sidebar ul ul li a {
      font-size: 16px;
      font-weight: normal;
      background-color: #4CAF50;
    }

    .sidebar ul ul li a:hover {
      background-color: #3e8e41;
    }

    .main-content {
      flex: 1;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding-top: 30px;
    }

    .top-bar {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .top-bar h1 {
      margin: 0;
      font-size: 24px;
    }

    .top-bar button {
      background-color: transparent;
      border: none;
      color: #fff;
      font-size: 20px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="dashboard">
    <div class="sidebar" id="sidebar">
      <h2>College Dashboard</h2>
      <ul>
        <li><a href="#" onclick="toggleDropdown('studentManagement')">Student Management</a>
          <ul id="studentManagement">
            <li><a href="add_student.php">Add Student</a></li>
            <li><a href="edit_student.php">Edit Student</a></li>
            <li><a href="delete_student.php">Delete Student</a></li>
            <li><a href="view_student.php">View Student</a></li>
          </ul>
        </li>
        <li><a href="#" onclick="toggleDropdown('courseManagement')">Course Management</a>
          <ul id="courseManagement">
            <li><a href="add_course.php">Add Course</a></li>
            <li><a href="delete_course.php">Delete Course</a></li>
            <li><a href="view_course.php">View Course</a></li>
          </ul>
        </li>
        <li><a href="#" onclick="toggleDropdown('facultyManagement')">Faculty Management</a>
          <ul id="facultyManagement">
            <li><a href="add_faculty.php">Add Faculty</a></li>
            <li><a href="edit_faculty.php">Edit Faculty</a></li>
            <li><a href="delete_faculty.php">Delete Faculty</a></li>
            <li><a href="view_faculty.php">View Faculty</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="main-content">
      <div class="top-bar" id="admin">
        <h1>Admin</h1> <button onclick="toggleSidebar()"> <i class="fas fa-bars"></i> </button>
      </div>
    </div>
  </div>

  <script>
    function toggleDropdown(id) {
      var element = document.getElementById(id);
      element.classList.toggle("active");
    }

    function toggleSidebar() {
      var sidebar = document.getElementById("sidebar");
      sidebar.classList.toggle("collapsed");
    }
  </script>

</body>

</html>