<?php
function connectDB(){
    $serverName = "localhost";
    $dbName = "auto";
    $userName = "Auto";
    $password = "LabaiSlaptas123";

    $conn = new mysqli($serverName, $userName, $password, $dbName);

    if ($conn->connect_error) {
        die("Nepavyko prisijungti: " . $conn->connect_error);
    } return $conn;
}
