<?php
session_start();
include('db_connection.php');

$admin_id = $_GET['id']; // Get the ID from the URL

// Delete data
$sql_delete = "DELETE FROM admin WHERE id='$admin_id'";
$result_delete = mysqli_query($connection, $sql_delete);

if ($result_delete) {
    echo "<script>alert('Admin data deleted successfully!');</script>";
    echo "<script>console.log($result_delete);</script>";
    // Redirect to the main admin management page or any other desired page
    header("Location: show_admin.php");
    exit();
} else {
    echo "Error deleting admin data: " . mysqli_error($connection);
}
?>
