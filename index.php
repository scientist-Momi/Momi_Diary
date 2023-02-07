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
        <section class="form login">
            <header>Your Personal Online Diary</header>
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="on" id="signinForm">
                <div class="error-text"></div>
                <div class="success-text"></div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Open diary" id="signinBtn">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="signup.php">Signup now</a></div>
        </section>
    </div>

    <script src="logic/signin.js"></script>
</body>

</html>