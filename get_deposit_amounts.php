<?php
// get_deposit_amounts.php

header('Content-Type: application/json');

// Database connection
$host = 'localhost'; // Your database host
$db = 'your_database'; // Your database name
$user = 'your_username'; // Your database username
$pass = 'your_password'; // Your database password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]));
}

// Get start_date and end_date from the query parameters
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

// Prepare and execute the SQL query
$sql = "SELECT SUM(amount) AS total_deposit FROM transactions WHERE transaction_type = 'Deposit' AND created_at BETWEEN ? AND ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();

$data = $result->fetch_assoc();
$total_deposit = $data['total_deposit'] ? $data['total_deposit'] : 0;

// Return the response
echo json_encode(['success' => true, 'amounts' => [$total_deposit]]);

$stmt->close();
$conn->close();
?>
