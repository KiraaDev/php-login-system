<?php
    include './config/auth.php';
    checkAuth();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Dashboard</title>
</head>

<body>
    <?php include './includes/admin_header.php' ?>
    <h1>Dashboard</h1>
    <?php echo $_SESSION['user_email'] ?>
</body>

</html>