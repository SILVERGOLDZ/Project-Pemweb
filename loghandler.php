<?php
session_start();

// Get JSON data from POST request
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['companyName']) && isset($data['email']) && isset($data['profileImage'])) {
    $_SESSION['companyName'] = $data['companyName'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['profileImage'] = $data['profileImage'];

    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
}
?>
