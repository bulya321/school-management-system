<?php
include 'auth.php';
if ($_SESSION['role'] !== 'admin') {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit();
}
require 'db.php';
$id = $_POST['id'] ?? '';
$full_name = $_POST['full_name'] ?? '';
$class = $_POST['class'] ?? '';
if ($id && $full_name && $class) {
    $stmt = $pdo->prepare('UPDATE students SET full_name = ?, class = ? WHERE id = ?');
    $stmt->execute([$full_name, $class, $id]);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Missing data']);
} 