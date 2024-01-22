<?php
// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
// Continue with the protected page content or include other files

// echo "Welcome, $username! You have permission to access this page.";

// Your protected page content goes here
?>
