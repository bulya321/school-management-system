<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = strtolower($_POST['role'] ?? '');

    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? AND role = ?');
    $stmt->execute([$email, $role]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['username'] = $user['username'];
        if ($user['role'] === 'admin') {
            header('Location: admin dashboard.html');
        } elseif ($user['role'] === 'teacher') {
            header('Location: teacher dashboard.html');
        } else {
            header('Location: student.html');
        }
        exit();
    } else {
        header('Location: new2.php?error=1');
        exit();
    }
} 