<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

function redirectToLogin() {
    header("Location: ../Financia_Sign_In.php");
    exit();
}

// Use this at the start of protected pages
if (!isLoggedIn()) {
    redirectToLogin();
}
?> 