<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmscape";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['user_id'])) {
  $userId = intval($_GET['user_id']); // Get the seller's ID from the request

  $query = "SELECT telephone FROM users WHERE id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();
      echo json_encode(['success' => true, 'telephone' => $user['telephone']]);
  } else {
      echo json_encode(['success' => false, 'message' => 'Seller phone number not found']);
  }
} else {
  echo json_encode(['success' => false, 'message' => 'Seller ID not provided']);
}


