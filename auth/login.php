<?php
session_start();

require '../utils/load_env.php';

$googleClient = $_ENV['GOOGLE_CLIENT'];

if (isset($_COOKIE['token'])) {
    header("Location: ../home/home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/auth.css">
    <title>Hanzo Cakery | Login</title>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div class="logo">
                <img src="../assets/icon/Logo.svg" alt="">
            </div>
            <h1>Log in</h1>
            <p>Log in to place your next delicious order</p>
            <?php if (isset($_SESSION['success'])): ?>
                <div class="message-success">
                    <p class="success"><?= $_SESSION['success'] ?></p>
                    <?php unset($_SESSION['success']) ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="message-error">
                    <p class="error"><?= $_SESSION['error'] ?></p>
                    <?php unset($_SESSION['error']) ?>
                </div>
            <?php endif; ?>
            <form action="login_validate.php" method="POST">
                <input type="text" placeholder="Username" name="username">
                <input type="password" placeholder="Password" name="password">
                <a href="forgot-password.php" style="text-align: right;">Forgot password?</a>
                <button>Log in</button>
            </form>
            <div class="divider">
                <span>or</span>
            </div>
            <div class="google-login">
                <a class="google-button" href="google-login.php">
                    <i class="fa-brands fa-google"></i>
                    Continue with Google
                </a>
            </div>
            <p>Don't have an account yet? <a href="signup.php">Sign up</a></p>
        </div>
    </div>
</body>

</html>