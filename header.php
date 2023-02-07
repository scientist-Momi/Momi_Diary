<?php
session_start();

include_once "logic/db_connector.php";

if (!isset($_SESSION['user_unique'])) {
    header("location: index.php");
} else {
    $user_unique = stripslashes($_SESSION['user_unique']);

    $sql1 = mysqli_query($conn, "select * from usersDB where unique_id = '$user_unique' ");
    $sql1_array = mysqli_fetch_assoc($sql1);

    $sql2 = mysqli_query($conn, "select * from notesDB where unique_id = '$user_unique' ");
    $sql3 = mysqli_query($conn, "select * from todoDB where unique_id = '$user_unique' ");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Momi_Diary || Your personal online diary.</title>
</head>