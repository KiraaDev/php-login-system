<?php
include __DIR__ . '../config/functions.php';
session_start();
unset($_SESSION);
session_destroy();
header("location: ".BASE_URL);
die();
