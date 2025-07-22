<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['fullName'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = strtolower($_POST['role'] ?? '');
    $username = $email;

    // Check if user exists
    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        header('Location: new1.php?error=exists');
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)');
    $stmt->execute([$username, $email, $hashedPassword, $role]);

    // Optionally insert into students/teachers
    $userId = $pdo->lastInsertId();
    if ($role === 'student') {
        $stmt = $pdo->prepare('INSERT INTO students (user_id, full_name) VALUES (?, ?)');
        $stmt->execute([$userId, $fullName]);
    } elseif ($role === 'teacher') {
        $stmt = $pdo->prepare('INSERT INTO teachers (user_id, full_name) VALUES (?, ?)');
        $stmt->execute([$userId, $fullName]);
    }

    header('Location: new2.php?signup=success');
    exit();
} 