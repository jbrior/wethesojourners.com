<?php
    $servername = "localhost";
    $username = "***DATABASE USERNAME HERE***";
    $password = "***DATABASE PASSWORD HERE***";
    $db = "****DATABASE NAME HERE****";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>
