<?php
include 'db_connection.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);

    $id = $input['id'];
    $name = $input['name'];
    $email = $input['email'];
    $password = $input['password'];
    // Note: In production, hash this password!
    if (empty($password) || $password == null || $password == '') {
        $sql = "UPDATE registration SET name = '$name', email = '$email' WHERE id = '$id'";
    } else {
        $sql = "UPDATE registration SET name = '$name', email = '$email', password = '$password' WHERE id = '$id'";
    }
    // Simple insert query

    if ($conn->query($sql) === TRUE) {
        $response['status'] = 'success';
        $response['id'] = $id;
        $response['name'] = $name;
        $response['email'] = $email;
        $response['message'] = 'Update successful';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: " . $sql . "<br>" . $conn->error';
    }
}

echo json_encode($response);
$conn->close();
?>