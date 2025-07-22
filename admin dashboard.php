<?php
include 'auth.php';
if ($_SESSION['role'] !== 'admin') {
    header('Location: new2.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System - Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        #header {
            background-color: #6b48ff;
            color: white;
            padding: 10px;
        }
        #header img {
            width: 60px;
            vertical-align: middle;
        }
        nav {
            background-color: #4a90e2;
            padding: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }
        nav a:hover {
            color: #ffd700;
        }
        .content {
            padding: 20px;
            background-color: white;
            margin: 20px auto;
            width: 80%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background-color: #4a90e2;
            color: white;
        }
        td button {
            background-color: #4a90e2;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 5px;
        }
        td button.red {
            background-color: #ff4444;
        }
        td button:hover {
            opacity: 0.8;
        }
        footer {
            background-color: #6b48ff;
            color: white;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="header">
        <img src="school2.png" alt="School Logo">
        <h1>School Management System - Admin</h1>
    </div>

    <nav>
        <a href="admin dashboard.html" style="color: #ffd700;">Dashboard</a>
        <a href="admin manage student.html">Manage Students</a>
        <a href="admin manage teachers.html">Manage Teachers</a>
        <a href="admin manage avents.html">Manage Events</a>
        <a href="admin manage users.html">Manage Users</a>
        <a href="admin manage settings.html">System Settings</a>
        <a href="login page.html" onclick="logout()" style="background-color: #ff4444; padding: 5px 10px; border-radius: 5px;">Logout</a>
    </nav>

    <div class="content">
        <h2>Dashboard</h2>
        <div>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> (Admin) | <a href="logout.php">Logout</a></div>
        <table>
            <tr>
                <th>Class</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>10A</td>
                <td><button>Edit</button><button class="red">Delete</button></td>
            </tr>
            <tr>
                <td>10B</td>
                <td><button>Edit</button><button class="red">Delete</button></td>
            </tr>
            <tr>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>Mathematics</td>
                <td><button>Edit</button><button class="red">Delete</button></td>
            </tr>
            <tr>
                <td>Science</td>
                <td><button>Edit</button><button class="red">Delete</button></td>
            </tr>
        </table>
    </div>

    <footer>
        <p>© 2025 School Management System. All rights reserved. Last updated: 09:30 PM PKT, Saturday, June 07, 2025.</p>
    </footer>

    <script>
        function logout() {
            localStorage.clear();
            window.location.href = "login page.html";
        }
    </script>
</body>
</html>
