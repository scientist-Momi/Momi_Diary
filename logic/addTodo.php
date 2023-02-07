<?php
session_start();

include_once "db_connector.php";

if (!isset($_SESSION['user_unique'])) {
    header("location: index.php");
} else {
    $unique = stripslashes($_SESSION['user_unique']);
}

// Getting all inputs from form
$eTitle = filter_var($_POST['eTitle']);
$eDate = stripslashes($_POST['eDate']);

// Check if fields are empty
if (empty($eTitle)) {
    echo "Please add event title.";
} elseif (empty($eDate)) {
    echo "Add event date.";
} else {
    $todo_uid = uniqid('event');

    $sql1 = mysqli_query($conn, "insert into todoDB (unique_id,todo_uid,title,date) values ('$unique', '$todo_uid', '$eTitle', '$eDate') ");

    if ($sql1) {
        echo "Successful";
    } else {
        echo "Unable to add note.";
    }
}
