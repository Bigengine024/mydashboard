<?php
$conn = new mysqli("localhost", "root", "", "mydashboard");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>