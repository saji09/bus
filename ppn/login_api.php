<?php
include 'config.php';
$user_name = $_POST['user_name'];
$password = md5($_POST['password']);
$sql = "SELECT * FROM users WHERE user_name = '$user_name' AND password = '$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['role'] = $row['role'];
    if ($row['role'] == 'admin') {
        $data = array(
            'id' => $row['id'],
            'text' => 'admin'
        );
        echo json_encode($data);
    } else {
        $data = array(
            'id' => $row['id'],
            'text' => 'success'
        );
        echo json_encode($data);
    };
} else {
    $data = array(
        'id' => 0,
        'text' => 'Password or User Name is incorrect'
    );
    echo json_encode($data);
}
