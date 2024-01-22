
<?php
session_start();
include('db_connection.php');
// include('check_permission.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            // Set the user session
            $_SESSION['username'] = $username;
            // echo "Login successful. Welcome, $username!";
        
            echo '<div class="after-login">
            <h1>Login successful. Welcome,' . $username . '!</h1>
            <p>
                <p>Admin:'.$username.'</p> 
                <a href="logout.php">Logout</a> ||
                <a href="insert_admin.php">Insert</a> ||
                <a href="update_admin.php">Update</a> ||
                <a href="show_admin.php">Show Data</a>
            </p>
        </div>';
        
        } else {
            echo "Invalid password. <a href='login.php'>Try again</a>";
        }
    } else {
        echo "User not found. <a href='signup.php'>Signup</a>";
    }
} else {
    // If the request method is not POST, redirect to index.php
    header("Location: index.php");
    exit();
}
?>
<style type="text/css">
        <?php include 'authenticate.css'; ?>
</style>
