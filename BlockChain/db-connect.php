<?php

$sname = "localhost";
$unmae = "root";
$password = "";

$db_name = "db1_users";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if(!$conn) {
    echo "connection failed";
}
?>