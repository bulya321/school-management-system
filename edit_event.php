<?php
include 'auth.php';
if ($_SESSION['role'] !== 'admin') {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit();
}
require 'db.php';
$id = $_GET['id'] ?? '';
if ($id) {
    $stmt = $pdo->prepare('SELECT * FROM events WHERE id = ?');
    $stmt->execute([$id]);
    $event = $stmt->fetch();
    if ($event) {
        echo json_encode(['success' => true, 'event' => $event]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Not found']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No ID']);
} 