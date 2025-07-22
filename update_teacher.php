<?php
include 'auth.php';
if ($_SESSION['role'] !== 'admin') {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit();
}
require 'db.php';
$id = $_POST['id'] ?? '';
$full_name = $_POST['full_name'] ?? '';
$subject = $_POST['subject'] ?? '';
if ($id && $full_name && $subject) {
    $stmt = $pdo->prepare('UPDATE teachers SET full_name = ?, subject = ? WHERE id = ?');
    $stmt->execute([$full_name, $subject, $id]);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Missing data']);
} 