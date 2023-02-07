<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Momi_Diary || Your personal online diary.</title>
</head>

<body>
    <div class="logo">
        <img src="momi.png" alt="">
    </div>
    <div class="wrapper">
        <section class="form signup">
            <header>Your Personal Online Diary</header>
            <form action="#" enctype="multipart/form-data" autocomplete="off" id="addUser">
                <div class="error-text"></div>
                <div class="success-text"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First name">
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last name">
                    </div>
                </div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter new password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Select Image</label>
                    <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Continue to Chat" id="addUserBtn">
                </div>
            </form>
            <div class="link">Already signed up? <a href="index.php">Login now</a></div>
        </section>
    </div>

    <script src="logic/signup.js"></script>
</body>

</html>