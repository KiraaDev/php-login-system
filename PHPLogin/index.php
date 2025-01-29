<?php
include './config/auth.php';
redirectIfLoggedIn();

include_once './config/database.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Home</title>
</head>

<body>
    <?php include './includes/header.php' ?>

    <h1>HOME PAGE</h1>

</body>

</html>