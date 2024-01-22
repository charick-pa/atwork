<?php
session_start();
include('db_connection.php');

// Fetch existing data for update
$existing_data = array();

// Function to fetch all admin data
function fetchAdminData($connection) {
    $sql_fetch_all = "SELECT * FROM admin";
    $result_fetch_all = mysqli_query($connection, $sql_fetch_all);

    $admin_data = array();

    if ($result_fetch_all && mysqli_num_rows($result_fetch_all) > 0) {
        while ($row = mysqli_fetch_assoc($result_fetch_all)) {
            $admin_data[] = $row;
        }
    } else {
        echo "Error fetching admin data: " . mysqli_error($connection);
    }

    return $admin_data;
}

// Fetch all admin data
$admin_data = fetchAdminData($connection);

// Handle actions (fetch, update, delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ... (existing code remains unchanged)

    // Fetch all admin data after update or delete
    $admin_data = fetchAdminData($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admin Data</title>
    <style type="text/css">
        <?php include 'style.css'; ?>
    </style>
</head>
<body>
    <div class="container-form">
        <h2>Manage Admin Data</h2>

        <!-- Fetch Admin Data Form -->
        <form action="" method="post">
            <h3>Fetch Admin Data</h3>
            <label for="admin_id_fetch">Admin ID:</label>
            <input type="number" name="admin_id_fetch" required>
            <input type="submit" name="fetch" value="Fetch Admin Data">
        </form>

        <!-- Update Admin Data Form -->
        <form action="" method="post">
            <h3>Update Admin Data</h3>
            <!-- ... (existing code remains unchanged) -->
        </form>

        <!-- Delete Admin Data Form -->
        <form action="" method="post">
            <h3>Delete Admin Data</h3>
            <!-- ... (existing code remains unchanged) -->
        </form>

        <!-- Table to display admin data -->
        <h3>Admin Data</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Lastname</th>
                <th>Age</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($admin_data as $admin) : ?>
                <tr>
                    <td><?php echo $admin['id']; ?></td>
                    <td><?php echo $admin['admin_name']; ?></td>
                    <td><?php echo $admin['admin_lastname']; ?></td>
                    <td><?php echo $admin['admin_age']; ?></td>
                    <td><?php echo $admin['admin_email']; ?></td>
                    <td><?php echo $admin['admin_address']; ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="admin_id" value="<?php echo $admin['id']; ?>">
                            <input type="submit" name="fetch" value="Fetch">
                            <input type="submit" name="update" value="Update">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- Link to Logout -->
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
