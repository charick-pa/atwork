<?php
session_start();
include('db_connection.php');
include('check_permission.php');

$admin_id = $_GET['id']; // Get the ID from the URL

// Fetch existing data for update
$existing_data = fetchAdminDataById($connection, $admin_id);

// Handle the update action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_data'])) {
    $admin_name = $_POST['admin_name'];
    $admin_lastname = $_POST['admin_lastname'];
    $admin_age = $_POST['admin_age'];
    $admin_email = $_POST['admin_email'];
    $admin_address = $_POST['admin_address'];

    $sql_update = "UPDATE admin SET 
        admin_name='$admin_name', 
        admin_lastname='$admin_lastname', 
        admin_age='$admin_age', 
        admin_email='$admin_email', 
        admin_address='$admin_address' 
        WHERE id='$admin_id'";

    $result_update = mysqli_query($connection, $sql_update);

    if ($result_update) {
        echo "<script>alert('Admin data updated successfully!');</script>";
        // Redirect to the main admin management page or any other desired page
        header("Location: show_admin.php");
        exit();
    } else {
        echo "Error updating admin data: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin Data</title>
    <style type="text/css">
        <?php include 'style.css'; ?>
    </style>
</head>
<body>
    <div class="container-form">
        <h2>Update Admin Data</h2>

        <!-- Update Admin Data Form -->
        <form action="" method="post">
            <input type="hidden" name="admin_id" value="<?php echo $existing_data['id']; ?>">

            <label for="admin_name">Name:</label>
            <input type="text" name="admin_name" required value="<?php echo $existing_data['admin_name']; ?>"><br>

            <label for="admin_lastname">Lastname:</label>
            <input type="text" name="admin_lastname" required value="<?php echo $existing_data['admin_lastname']; ?>"><br>

            <label for="admin_age">Age:</label>
            <input type="number" name="admin_age" required value="<?php echo $existing_data['admin_age']; ?>"><br>

            <label for="admin_email">Email:</label>
            <input type="email" name="admin_email" required value="<?php echo $existing_data['admin_email']; ?>"><br>

            <label for="admin_address">Address:</label>
            <input type="text" name="admin_address" required value="<?php echo $existing_data['admin_address']; ?>"><br>

            <input type="submit" name="update_data" value="Update Admin Data">
        </form>

        <!-- Link to Logout -->
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
