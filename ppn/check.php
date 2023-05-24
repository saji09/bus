<?php
include 'config.php';
$date = $_POST['date'];
$time = $_POST['time'];
$from = $_POST['from'];
$to = $_POST['to'];
//check if any booking is made for the selected date and time
$check = "SELECT * FROM booking WHERE `date` = '$date' AND `time` = '$time' AND `from` = '$from' AND `to` = '$to'";
$result = $conn->query($check);
if ($result->num_rows > 0) {
    //if booking is made, get the booked seats and find the available seats from 1 to 40
    $booked = array();
    while ($row = $result->fetch_assoc()) {
        $booked[] = $row['booking_seat'];
    }
    $available = array();
    for ($i = 1; $i <= 40; $i++) {
        if (!in_array($i, $booked)) {
            $available[] = $i;
        }
    }
    //send the available seats to the ajax request
    echo json_encode($available);
} else {
    //if no booking is made, send an empty string to the ajax request
    //send the available seats 1 to 40 to the ajax request
    $available = array();
    for ($i = 1; $i <= 40; $i++) {
        $available[] = $i;
    }
    echo json_encode($available);
}
