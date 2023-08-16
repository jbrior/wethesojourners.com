<?php
    $servername = "localhost";
    $username = "u473293980_7MTgj";
    $password = "Nt0X[7y*!";
    $db = "u473293980_DqhyS";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>