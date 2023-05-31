<?php
session_start();

include "db-connect.php";
if (isset($_POST['email']) && isset($_POST['password'])) {

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$email = validate($_POST['email']);
$password = validate($_POST['password']);

    if (empty($email)) {
        header("Location: login.html?eror=User Name is required");
        exit();

    }else if (empty($password)){
        header("Location: login.html?eror=Password is required");
        exit();

    }else {
        $sql = "SELECT * FROM users WHERE email='$email' and password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
           $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['password'] === $password ) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: afterlogin.php");
                exit();

            }else{
                header("Location: login.html?eror=Incorrect User name or password");
                exit();
            }

        }else {
            header("Location: login.html?eror=Incorrect User name or password");
            exit();
        }
    }

}else {
    header("Location: login.html");
    exit();
}

?>
