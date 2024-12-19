<?php
session_start();
header('Content-Type: application/json');

echo json_encode([
    'loggedIn' => isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true,
    'username' => $_SESSION['username_email'] ?? null
]);
?> 