<?php
$servername = "localhost:8111";
    $username = "root";
    $password = "";
    $dbname = "studentdb";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>