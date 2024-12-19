<?php
session_start();
require 'db_connect.php'; // Ensure this path is correct

// Check if the user is logged in
if (!isset($_SESSION['username_email'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize the data from the POST request
    $goalName = trim($_POST['goal_name']);
    $minTargetAmount = trim($_POST['min_target_amount']);
    $maxTargetAmount = trim($_POST['max_target_amount']);
    $transactionType = trim($_POST['transaction_type']);
    $deadline = trim($_POST['deadline']);
    $bankType = trim($_POST['bank_type']);

    // Validate the inputs
    if (empty($goalName) || empty($minTargetAmount) || empty($maxTargetAmount) || empty($transactionType) || empty($deadline) || empty($bankType)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit();
    }

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO goals (username_email, goal_name, min_target_amount, max_target_amount, transaction_type, deadline, bank_type) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $_SESSION['username_email'], $goalName, $minTargetAmount, $maxTargetAmount, $transactionType, $deadline, $bankType);

    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Goal saved successfully.',
            'goal_id' => $stmt->insert_id
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error saving goal: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
