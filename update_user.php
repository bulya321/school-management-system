<?php
include 'auth.php';
if ($_SESSION['role'] !== 'admin') {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit();
}
require 'db.php';
$id = $_POST['id'] ?? '';
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$role = $_POST['role'] ?? '';
if ($id && $username && $email && $role) {
    $stmt = $pdo->prepare('UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?');
    $stmt->execute([$username, $email, $role, $id]);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Missing data']);
} 