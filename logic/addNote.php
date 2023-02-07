<?php
session_start();

include_once "db_connector.php";

if (!isset($_SESSION['user_unique'])) {
    header("location: index.php");
} else {
    $unique = stripslashes($_SESSION['user_unique']);
}

// Getting all inputs from form
$title = filter_var($_POST['title']);
$body = stripslashes($_POST['note_body']);

// Check if fields are empty
if (empty($title)) {
    echo "Please add a note title.";
} elseif (empty($body)) {
    echo "Add note body.";
} else {
    $note_uid = uniqid('note');

    $date = date("y-m-d");

    $sql2 = mysqli_query($conn, "insert into notesDB (unique_id,note_uid,title,body,date) values ('$unique', '$note_uid', '$title', '$body', '$date') ");

    // echo $unique . $note_uid . $title . $body . $date;

    if ($sql2) {
        echo "Successful";
    } else {
        echo "Unable to add note.";
    }
}
