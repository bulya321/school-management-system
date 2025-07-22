<?php
include 'auth.php';
if ($_SESSION['role'] !== 'admin') {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit();
}
require 'db.php';
$id = $_GET['id'] ?? '';
if ($id) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$id]);
    $user = $stmt->fetch();
    if ($user) {
        echo json_encode(['success' => true, 'user' => $user]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Not found']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No ID']);
} 