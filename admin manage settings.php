<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System - System Settings</title>
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
        <h1>School Management System - System Settings</h1>
    </div>

    <nav>
        <a href="admin dashboard.html">Dashboard</a>
        <a href="admin manage student.html">Manage Students</a>
        <a href="admin manage teachers.html">Manage Teachers</a>
        <a href="admin manage avents.html">Manage Events</a>
        <a href="admin manage users.html">Manage Users</a>
        <a href="admin manage settings.html" style="color: #ffd700;">System Settings</a>
        <a href="login page.html" onclick="logout()" style="background-color: #ff4444; padding: 5px 10px; border-radius: 5px;">Logout</a>
    </nav>

    <div class="content">
        <h2>System Settings</h2>
        <p>Update system preferences and configurations here.</p>
        <button onclick="alert('Settings update feature coming soon!')" style="background-color: #4a90e2; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Update Settings</button>
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
