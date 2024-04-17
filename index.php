<!DOCTYPE html>
<html>

<head>
  <title>User Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
    body,
    html {
      margin: 0;
      padding: 0;
      height: 100%;
    }
    .button:hover a {
      color: black;
    }

    .container {
      display: flex;
      height: 100%;
    }

    .content {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: #f4f4f4;
      padding: 20px;
    }

    .text {
      margin-bottom: 20px;
      font: bold;
      font-size: 50px;
    }

    .buttons {
      display: flex;
    }

    .button {
      margin-right: 20px;
      padding: 15px 30px;
      border: 2px solid transparent;
      border-radius: 5px;
      font-size: 20px;
      transition: background-color 0.3s, border-color 0.3s;
    }

    .button:hover {
      background-color: #4CAF50;
      border-color: #4CAF50;  
    }

    .button a {
      text-decoration: none;
      color: white;
    }

    .image {
      flex: 1;
      background-image: url('college.jpg');
      background-size: cover;
      background-position: center;
      height: 100%;
    }

    .my {
      text-decoration: none;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="content">
      <h1 class="text">College Management System</h1>
      <div class="buttons">
        <button class="w3-button w3-green button"><a href="login1.php" class="my">Admin</a></button>

        <button class="w3-button w3-green button b-3">
          <a href="user_login.php" class="my">User</a>
        </button>
      </div>
    </div>
    <div class="image"></div>
  </div>

</body>

</html>
