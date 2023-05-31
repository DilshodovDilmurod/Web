<?php
require 'connectphp.php';
$username = $_POST["username"]; 
$email = $_POST["email"];
$password = $_POST["password"];

$query_sql = " INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: login.html");
}else {
    echo "tizimga krolmadingiz : " . mysqli_error($conn);
}