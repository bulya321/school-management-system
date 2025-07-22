<?php
$loginError = isset($_GET['error']);
$signupSuccess = isset($_GET['signup']) && $_GET['signup'] === 'success';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <style>
        body {
		font-family: Arial, sans-serif; 
		margin: 0; 
		padding: 0; 
		display: flex; 
		justify-content: center; 
		align-items: center; 
		height: 100vh; 
		background-color: #f4f4f4; 
		}
        .container {
		width: 400px;
		padding: 20px;
		background-color: white;
		border-radius: 8px;
		box-shadow: 0 0 10px rgba(0,0,0,0.1); 
		text-align: center; 
		}
        .logo {
		margin-bottom: 20px;
		margin-top: 35px;
		}
        .logo img { 
		max-width: 150px; 
		}
        h2 {
		color: #333;
		}
        .form-group {
		margin-bottom: 15px; 
		text-align: left; 
		}
        .form-group label { 
		display: block;
		margin-bottom: 5px; 
		font-weight: bold; 
		}
        .form-group input, .form-group select {
		width: 100%; 
		padding: 8px; 
		border: 1px solid #ccc; 
		border-radius: 4px; 
		box-sizing: border-box;
		}
        .form-group select {
		height: 35px;
		}
        button {
		width: 100%; 
		padding: 10px; 
		background-color: #007bff; 
		color: white; 
		border: none; 
		border-radius: 4px; 
		cursor: pointer; 
		font-size: 16px; 
		}
        button:hover {
		background-color: #0056b3;
		}
        .login-link {
		margin-top: 15px; 
		}
        .login-link a {
		color: #007bff;
		text-decoration: none; 
		}
        .login-link a:hover { 
		text-decoration: underline;
		}
        .error {
		color: red;
		font-size: 12px; 
		margin-top: 5px;
		}
        .success {
		color: green;
		font-size: 14px;
		margin-top: 5px;
		}
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="school2.png" alt="School Management System Logo">
            <h1>School Management System</h1>
        </div>
        <h2>Log In</h2>
        <?php if ($loginError): ?>
            <div class="error">Invalid credentials or role mismatch. Please try again.</div>
        <?php endif; ?>
        <?php if ($signupSuccess): ?>
            <div class="success">Signed up successfully! Please log in.</div>
        <?php endif; ?>
        <form id="loginForm" method="POST" action="login.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="">Select Role</option>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit">Log In</button>
        </form>
        <div class="login-link">
            <p>Don't have an account? <a href="new1.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html> 