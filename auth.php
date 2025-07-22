<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: new2.php');
    exit();
} 