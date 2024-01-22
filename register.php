<?php
// Include database connection
session_start();
include('db_connection.php');
// echo'connected';

// If user already logged in, send them to index
// if ( ! empty( $_SESSION['username'] ) ) {
//     header('Location:index.php');
//     exit;
// }


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo "Registration successful. <a href='index.php'>Login</a>";
    } else {
        // echo "Error: " . mysqli_error($connection);
        echo "user alrady taked";
    }
}else{
    header("location: index.php");
}
?>
