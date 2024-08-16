<?php
include 'db.php';

$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'];
$password = password_hash($data['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "You are signed up successfully!"]);
} else {
    echo json_encode(["message" => "Signup failed, please try again."]);
}

$conn->close();
?>
