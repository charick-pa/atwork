<?php
// Fetch all admin data
session_start();
include('db_connection.php');
include('check_permission.php');

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
?>
<style type="text/css">
        <?php include 'showadmin.css'; ?>
</style>
<!-- Display Admin Data Table -->
<div class="container">
    <h3>Admin Data</h3>
    <p><a href="insert_admin.php">Insert</a></p>
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
        <?php
        // Number of rows to display per page
        $rowsPerPage = 10;

        // Get the current page, default to 1 if not set
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        // Fetch admin data for the current page
        $admin_data = fetchAdminData($connection, $page, $rowsPerPage);
        
        foreach ($admin_data as $admin) : ?>
            <tr>
                <td><?php echo $admin['id']; ?></td>
                <td><?php echo $admin['admin_name']; ?></td>
                <td><?php echo $admin['admin_lastname']; ?></td>
                <td><?php echo $admin['admin_age']; ?></td>
                <td><?php echo $admin['admin_email']; ?></td>
                <td><?php echo $admin['admin_address']; ?></td>
                <td>
                    <a href="update_admin.php?id=<?php echo $admin['id']; ?>">Update</a>
                    <a href="delete_admin.php?id=<?php echo $admin['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Pagination Links -->
    <div class="pagination">
        <?php
        // Calculate total number of pages
        $sql_count_rows = "SELECT COUNT(*) FROM admin";
        $result_count_rows = mysqli_query($connection, $sql_count_rows);
        $totalRows = mysqli_fetch_array($result_count_rows)[0];
        $totalPages = ceil($totalRows / $rowsPerPage);

        // Display pagination links
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?page=$i'>$i</a> ";
        }
        ?>
        <p><a href="logout.php">Logout </a> <a href="authenticate.php">authenticate</a></p>
        
    </div>
</div>

