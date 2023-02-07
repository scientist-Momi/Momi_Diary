<?php
session_start();

include_once "db_connector.php";


// Getting all inputs from form
$noteID = filter_var($_POST['noteID']);
$upTitle = filter_var($_POST['upTitle']);
$upBody = stripslashes($_POST['upBody']);

// Check if fields are empty
if (empty($upTitle)) {
    echo "Title can't be empty.";
} elseif (empty($upBody)) {
    echo "Body can't be empty.";
} else {

    $sql1 = mysqli_query($conn, " select * from notesDB where note_uid = '$noteID' ");
    $sql1_array = mysqli_fetch_assoc($sql1);

    $b4Title = $sql1_array['title'];
    $b4Body = $sql1_array['body'];

    if (($upTitle == $b4Title) && ($upBody == $b4Body)) {
        echo " No changes made to Title or Body.";
    } else {
        $date = date("y-m-d");

        $sql2 = mysqli_query($conn, "update notesDB set title = '$upTitle', body = '$upBody', date = '$date' where note_uid = '$noteID' ");

        if ($sql2) {
            echo "Successful";
        } else {
            echo "Unable to update note.";
        }
    }
}
