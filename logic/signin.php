<?php
session_start();

include_once "db_connector.php";

// Getting all inputs from form
$email = stripslashes($_POST['email']);
$password = stripslashes($_POST['password']);

// Check if fields are empty
if (empty($email)) {
    echo "Please input registered email.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please input a valid email.";
} elseif (empty($password)) {
    echo "Please input your correct password.";
} else {
    $sql1 = mysqli_query($conn, "select * from usersDB where email = '$email' ");
    if (mysqli_num_rows($sql1) > 0) {
        $sql1_array = mysqli_fetch_assoc($sql1);
        $hash_pass = $sql1_array['password'];
        if (password_verify($password, $hash_pass)) {
            $_SESSION["user_unique"] =
                $sql1_array['unique_id'];
            echo "Successful";
        } else {
            echo "Password is incorrect.";
        }
    } else {
        echo "Email not found.";
    }
}
