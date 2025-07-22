<?php
include 'auth.php';
if ($_SESSION['role'] !== 'admin') {
    header('Location: new2.php');
    exit();
}
require 'db.php';
$teachers = $pdo->query('SELECT * FROM teachers')->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System - Manage Teachers</title>
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
        <h1>School Management System - Manage Teachers</h1>
    </div>

    <nav>
  <a href="admin dashboard.php">Dashboard</a>
  <a href="admin manage student.php">Manage Students</a>
  <a href="admin manage teachers.php" style="color: #ffd700;">Manage Teachers</a>
  <a href="admin manage avents.php">Manage Events</a>
  <a href="admin manage users.php">Manage Users</a>
  <a href="admin manage settings.php">System Settings</a>
  <a href="logout.php" style="background-color: #ff4444; padding: 5px 10px; border-radius: 5px;">Logout</a>
</nav>

    <div class="content">
        <h2>Manage Teachers</h2>
        <table>
            <tr>
                <th>Teacher ID</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($teachers as $teacher): ?>
            <tr id="teacher-row-<?php echo $teacher['id']; ?>">
                <td><?php echo $teacher['id']; ?></td>
                <td><?php echo htmlspecialchars($teacher['full_name']); ?></td>
                <td><?php echo htmlspecialchars($teacher['subject']); ?></td>
                <td>
                    <button onclick="editTeacher(<?php echo $teacher['id']; ?>)">Edit</button>
                    <button class="red" onclick="deleteTeacher(<?php echo $teacher['id']; ?>)">Delete</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <!-- Edit Modal -->
        <div id="editModal" style="display:none;">
            <form id="editForm">
                <input type="hidden" id="editId">
                <label>Name: <input type="text" id="editName"></label>
                <label>Subject: <input type="text" id="editSubject"></label>
                <button type="submit">Save changes</button>
                <button type="button" onclick="closeEditModal()">Cancel</button>
            </form>
        </div>
    </div>

    <footer>
        <p>© 2025 School Management System. All rights reserved. Last updated: 09:30 PM PKT, Saturday, June 07, 2025.</p>
    </footer>

    <script>
        function logout() {
            localStorage.clear();
            window.location.href = "login page.html";
        }
        function deleteTeacher(id) {
            if (confirm('Are you sure you want to delete this teacher?')) {
                fetch('delete_teacher.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: 'id=' + encodeURIComponent(id)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('teacher-row-' + id).remove();
                    } else {
                        alert('Delete failed: ' + (data.error || ''));
                    }
                });
            }
        }
        function editTeacher(id) {
            fetch('edit_teacher.php?id=' + encodeURIComponent(id))
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('editId').value = data.teacher.id;
                    document.getElementById('editName').value = data.teacher.full_name;
                    document.getElementById('editSubject').value = data.teacher.subject;
                    document.getElementById('editModal').style.display = 'block';
                } else {
                    alert('Fetch failed: ' + (data.error || ''));
                }
            });
        }
        document.getElementById('editForm').onsubmit = function(e) {
            e.preventDefault();
            var id = document.getElementById('editId').value;
            var name = document.getElementById('editName').value;
            var subject = document.getElementById('editSubject').value;
            fetch('update_teacher.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: 'id=' + encodeURIComponent(id) + '&full_name=' + encodeURIComponent(name) + '&subject=' + encodeURIComponent(subject)
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Update failed: ' + (data.error || ''));
                }
            });
        };
        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>
</body>
</html>
