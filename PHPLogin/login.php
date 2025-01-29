<?php 
include './config/auth.php';
redirectIfLoggedIn();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Login</title>
</head>

<body>
    <?php include './includes/header.php' ?>

    <div class="main">
        <div class="container">
            <div class="content">
                <img src="https://avatars.githubusercontent.com/u/123292825?v=4" alt="logo" class="logo_img">
                <form action="./login_check.php" class="content__form" id="loginForm" method="POST">

                    <p id="error-message" style="color: red; display: none; font-size: 13px;">All fields are required!</p>

                    <?php if (isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])): ?>
                        <div style="color: red; font-size: 13px;" id="error-login">
                            <?php 
                            echo $_SESSION['error_message']; 
                            unset($_SESSION['error_message']); // Unset error message after it's displayed
                            ?>
                        </div>
                    <?php endif; ?>

                    <div class="content__inputs">
                        <label>
                            <input type="text" name="email">
                            <span>Email</span>
                        </label>
                        <label>
                            <input type="password" name="password">
                            <span>Password</span>
                        </label>
                    </div>
                    <button name="submit">Log In</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#loginForm").submit(function(event) {
                let isValid = true;
                $("#error-message").hide();
                $("#error-login").hide();

                $("#loginForm input").each(function() {
                    if ($(this).val().trim() === "") {
                        isValid = false;
                        return false;
                    }
                });

                if (!isValid) {
                    event.preventDefault(); // Stop form submission
                    $("#error-message").show(); // Show error message
                }
            });
        });
    </script>
</body>

</html>