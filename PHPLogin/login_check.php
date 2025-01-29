<?php
session_start();
include __DIR__ . '../config/functions.php';
include_once './config/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        $database = new Database;

        $stmt = $database->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);

        if (!$stmt->execute()) {
            die("Error executing the query: " . $stmt->error);
        }

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['user_id']; // Store user ID in session
                $_SESSION['user_email'] = $row['email']; // Store user email in session
                header("Location: dashboard.php"); // Redirect to dashboard or another page
                exit();
            } else {
                // Invalid password
                $_SESSION['error_message'] = "Invalid login!";
                header("Location: login.php");
                exit();
            }
        } else {
            // email password
            $_SESSION['error_message'] = "Invalid Login!";
            header("Location: login.php");
            exit();
        }

        $stmt->close();

        // $_SESSION['user_id'] = $email;
        // header('Location: dashboard.php');
    }
} else {
    header("Location: " . BASE_URL);
    exit();
}
