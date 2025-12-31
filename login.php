<?php
include 'db_connection.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);

    $email = $input['email'];
    $password = $input['password']; // Note: In production, hash this password!

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM registration WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        if ($result->num_rows > 0) {
            $response['status'] = 'success';
            $response['message'] = 'Login successful';
            $response['id'] = $data['id'] ?? 0;
            $response['name'] = $data['name'] ?? '';
            $response['email'] = $data['email'];
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Invalid email or password';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Missing required fields';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method';
}

echo json_encode($response);
$conn->close();
?>