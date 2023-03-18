<?php
    session_start();
    if (isset($_POST['register'])) { 
        //storing user's username & password
        $user = $_POST['username'];
        $pwd = $_POST['password'];

        $file = 'db.txt';
        $current = file_get_contents($file);
        $current .= ',' .$user. ',' .$pwd ;
        file_put_contents($file, $current);

        //after registration, redirect to login page
        header("location:login.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="general.css">
</head>

<body>
    <br><br><br>
    <div class="wrap">
        <form class="form-page" action="register.php" method="post" name="Register_Form">
            <h2 style="text-align:center; padding-bottom: 15px">Register</h2>
            <p>Please fill in this form to create an account.</p>
            <hr class="hr1">

            <label for="username"><b>Username</b></label>
            <input class="form-input" type="text" name="username" placeholder="Enter Username" required="">

            <label for="password"><b>Password</b></label>
            <input class="form-input" type="password" name="password" placeholder="Enter Password" required="">

            <button class="register-button" name="register" type="submit">Register</button>

            <div class="login-or-register">
                <p>Already have an account? <a href="login.php">Sign in</a>.</p>
            </div>
        </form>
    </div>

</body>

</html>