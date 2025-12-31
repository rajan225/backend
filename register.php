<?php
include 'db_connection.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);

    $name = $input['name'];
    $email = $input['email'];
    $password = $input['password']; // Note: In production, hash this password!

    if (!empty($name) && !empty($email) && !empty($password)) {
        // Simple insert query
        $sql = "INSERT INTO registration (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Registration successful';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error: " . $sql . "<br>" . $conn->error';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Missing required fields';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid Request Method';
}

echo json_encode($response);
$conn->close();
?>