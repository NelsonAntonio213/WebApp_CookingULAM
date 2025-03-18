<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../Images/ABRA LOGO ONLY.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.1">
    <link rel="stylesheet" href="login.css">
    <title>Login / Signup</title>
</head>
<body>

<div class="container" id="container">
    <div class="form-container login">
        <form action="includes/login.inc.php" method="post">
            <h1>Login</h1>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="pwd" placeholder="Password" required>
            <button type="submit">LOGIN</button>
            <?php check_login_errors(); ?>
        </form>
    </div>

    <div class="form-container sign-up">
        <form action="includes/signup.inc.php" method="post">
            <h1>Signup</h1>
            <?php signup_inputs(); ?>
            <button type="submit">SIGNUP</button>
            <?php check_signup_errors(); ?>
        </form>
    </div>

    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Welcome to CookingUlam!</h1>
                <p>Enter your details of what you have registered to use all of the site’s features</p>
                <button class="hidden" id="login">Login</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Hello, Register NOW!</h1>
                <p>Register with your personal details to use all of the site’s features</p>
                <button class="hidden" id="register">Signup</button>
            </div>
        </div>


<script>
    const container = document.querySelector('.container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login'); 

    registerBtn.addEventListener('click', () => {
        container.classList.add('active');
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove('active');
    });
</script>

</body>
</html>
