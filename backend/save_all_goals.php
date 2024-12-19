<?php
session_start();
require 'db_connect.php'; // Ensure this path is correct

// Check if the user is logged in
if (!isset($_SESSION['username_email'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

// Get the JSON data from the request
$data = json_decode(file_get_contents('php://input'), true);

if (!is_array($data) || empty($data)) {
    echo json_encode(['success' => false, 'message' => 'No goals data provided.']);
    exit();
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO goals (username_email, goal_name, min_target_amount, max_target_amount, transaction_type, deadline, bank_type) VALUES (?, ?, ?, ?, ?, ?, ?)");

foreach ($data as $goal) {
    $stmt->bind_param("sssssss", $_SESSION['username_email'], $goal['goal_name'], $goal['min_target_amount'], $goal['max_target_amount'], $goal['transaction_type'], $goal['deadline'], $goal['bank_type']);
    if (!$stmt->execute()) {
        echo json_encode(['success' => false, 'message' => 'Error saving goal: ' . $stmt->error]);
        exit();
    }
}

$stmt->close();
$conn->close();

echo json_encode(['success' => true, 'message' => 'All goals saved successfully.']);
?>
