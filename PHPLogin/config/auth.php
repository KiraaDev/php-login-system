<?php
session_start();

function checkAuth() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
}
function redirectIfLoggedIn($redirectPage = 'dashboard.php') {
    if (isset($_SESSION['user_id'])) {
        header("Location: $redirectPage");
        exit();
    }
}

?>

