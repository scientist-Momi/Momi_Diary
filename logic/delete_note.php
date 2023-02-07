<?php
session_start();
include_once "db_connector.php";

$delete_id = stripslashes($_POST['delete_noteid']);

// echo "$delete_id";
$sql = mysqli_query($conn, "delete from notesDB where note_uid = '$delete_id' ");

if (!$sql) {
    header("location: logout.php");
}
