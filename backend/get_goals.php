<?php
session_start();
require 'db_connect.php'; // Ensure this path is correct

// Check if the user is logged in
if (!isset($_SESSION['username_email'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

$username_email = $_SESSION['username_email'];
$stmt = $conn->prepare("SELECT id, goal_name, min_target_amount, max_target_amount, transaction_type, deadline, bank_type FROM goals WHERE username_email = ?");
$stmt->bind_param("s", $username_email);
$stmt->execute();
$result = $stmt->get_result();

$goals = [];
while ($row = $result->fetch_assoc()) {
    $goals[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode(['success' => true, 'goals' => $goals]);
?> 