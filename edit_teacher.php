<?php
include 'auth.php';
if ($_SESSION['role'] !== 'admin') {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit();
}
require 'db.php';
$id = $_GET['id'] ?? '';
if ($id) {
    $stmt = $pdo->prepare('SELECT * FROM teachers WHERE id = ?');
    $stmt->execute([$id]);
    $teacher = $stmt->fetch();
    if ($teacher) {
        echo json_encode(['success' => true, 'teacher' => $teacher]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Not found']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No ID']);
} 