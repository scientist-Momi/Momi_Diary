<?php
include_once "db_connector.php";

// Getting all inputs from form
$fname = stripslashes($_POST['fname']);
$lname = stripslashes($_POST['lname']);
$email = stripslashes($_POST['email']);
$password = stripslashes($_POST['password']);
$file =  $_FILES['image'];

// Check if fields are empty
if (empty($fname)) {
    echo "First Name field cannot be empty.";
} elseif (empty($lname)) {
    echo "Last Name field cannot be empty.";
} elseif (empty($email)) {
    echo "Email field cannot be empty.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email you entered is invalid.";
} elseif (empty($password)) {
    echo "Password field cannot be empty.";
} elseif (strlen($password) < 8) {
    echo "Password should be more than 8 characters";
} elseif (empty($file['name'])) {
    echo "Please add a photo.";
} else {
    $sql1 = mysqli_query($conn, "select * from usersDB where email = '$email' ");
    if (mysqli_num_rows($sql1) > 0) {
        echo "Email you entered is already registered.";
    } else {

        // working on reuploading photo
        $affix = "momi";
        $avatar_name = $affix . $file['name'];
        $avatar_tmp_name = $file['tmp_name'];
        $avatar_destination_path = '../image/' . $avatar_name;

        // make sure file is an image
        $allowed_files = ['png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG'];
        $extension = explode('.', $avatar_name);
        $extension = end($extension);

        if (in_array($extension, $allowed_files)) {
            //make sure image is not too large

            if ($file['size'] < 2000000) {
                // to check if file already exists

                if (file_exists($avatar_destination_path)) {
                    echo "Sorry, image file already exist";
                } else {
                    move_uploaded_file($avatar_tmp_name, $avatar_destination_path);

                    // hash passwords
                    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

                    $unique = uniqid('user');

                    $sql2 = mysqli_query($conn, "insert into usersDB (unique_id,firstname,lastname,email,password,photo) values ('$unique', '$fname', '$lname', '$email', '$hashed_pass', '$avatar_name') ");

                    if ($sql2) {
                        echo "Successful";
                    } else {
                        echo "Error in registration.";
                    }
                }
            } else {
                echo "File size is too big. Should be less than 2mb.";
            }
        } else {
            echo "File should be png, jpg or jpeg.";
        }
    }
}
