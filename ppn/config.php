<?php
session_start();
//connect to database
$conn = new mysqli('localhost', 'root', '', 'ppn');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
