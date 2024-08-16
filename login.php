<?php
include 'db.php';

$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'];
$password = $data['password'];

$sql = "SELECT password FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo json_encode(["message" => "Login successful!"]);
    } else {
        echo json_encode(["message" => "Invalid username or password."]);
    }
} else {
    echo json_encode(["message" => "Invalid username or password."]);
}

$conn->close();
?>
