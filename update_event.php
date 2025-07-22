<?php
include 'auth.php';
if ($_SESSION['role'] !== 'admin') {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit();
}
require 'db.php';
$id = $_POST['id'] ?? '';
$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$event_date = $_POST['event_date'] ?? '';
if ($id && $title && $event_date) {
    $stmt = $pdo->prepare('UPDATE events SET title = ?, description = ?, event_date = ? WHERE id = ?');
    $stmt->execute([$title, $description, $event_date, $id]);
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Missing data']);
} 