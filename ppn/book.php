<?php
include 'config.php';
$date = $_POST['date'];
$time = $_POST['time'];
$from = $_POST['from'];
$to = $_POST['to'];
$mobile_no = $_POST['mobile'];
$seat = $_POST['seat'];
$seat_count = $_POST['seat_count'];
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
} else {
    $user_name = 'GUEST';
}

$sql = "INSERT INTO booking (`date`, `time`, `from`, `to`, `booking_seat`, `mobile_no`, `user_name`) VALUES ('$date', '$time', '$from', '$to', '$seat', '$mobile_no', '$user_name')";
if ($conn->query($sql) === TRUE) {
    $data = array(
        'id' => $conn->insert_id,
        'text' => 'success'
    );
    echo json_encode($data);
} else {
    echo "error";
}
