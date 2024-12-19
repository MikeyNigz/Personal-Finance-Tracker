<?php
session_start();
require 'db_connect.php'; // Ensure this path is correct

// Check if the user is logged in
if (!isset($_SESSION['username_email'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['goal_id'])) {
        echo json_encode(['success' => false, 'message' => 'Goal ID is missing.']);
        exit();
    }

    $goalId = intval($_POST['goal_id']);
    $stmt = $conn->prepare("DELETE FROM goals WHERE id = ? AND username_email = ?");
    $stmt->bind_param("is", $goalId, $_SESSION['username_email']);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Goal deleted successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Goal not found or already deleted.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error deleting goal.']);
    }

    $stmt->close();
    $conn->close();
}
?> 