<?php
include 'config.php';
$user_name = $_POST['user_name'];
$password = md5($_POST['password']);
$mobile_no = $_POST['mobile_no'];
$role = $_POST['role'];
//check user name already exists
$sql = "SELECT * FROM users WHERE user_name = '$user_name'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    header('Location: signup.php?error=User Name Already Exists');
    exit;
}
$sql = "INSERT INTO users (`user_name`, `password`, `mobile_no`, `role`) VALUES ('$user_name', '$password', '$mobile_no', '$role')";
if ($conn->query($sql) === TRUE) {
    header('Location: login.php?success=Signup Successfull');
} else {
    header('Location: signup.php?error=Signup Failed');
}
    