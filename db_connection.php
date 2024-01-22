<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "mydatabase";

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Other database connection code...

// Function to fetch admin data by ID
function fetchAdminDataById($connection, $admin_id) {
    $sql_fetch_by_id = "SELECT * FROM admin WHERE id='$admin_id'";
    $result_fetch_by_id = mysqli_query($connection, $sql_fetch_by_id);

    if ($result_fetch_by_id && mysqli_num_rows($result_fetch_by_id) > 0) {
        return mysqli_fetch_assoc($result_fetch_by_id);
    } else {
        echo "Error fetching admin data by ID: " . mysqli_error($connection);
        return array(); // Return an empty array in case of an error
    }
}

// Other database connection code...

?>
