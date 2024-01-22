<?php
// $servername = "your_server_name";
// $username = "your_username";
// $password = "your_password";
// $dbname = "your_database_name";
session_start();
include('db_connection.php');

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

if (isset($_POST['update'])) {
    $car_id = $_POST['car_id'];
    $new_price = $_POST['new_price'];

    $sql = "UPDATE Car SET Price = '$new_price' WHERE Car_id = $car_id";
    $connection->query($sql);
}

if (isset($_POST['delete'])) {
    $car_id = $_POST['car_id'];

    $sql = "DELETE FROM Car WHERE Car_id = $car_id";
    $conn->query($sql);
}

$sql = "SELECT * FROM Car";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
</head>
<body>

<h2>Car Details</h2>

<table border="1">
    <tr>
        <th>Car ID</th>
        <th>Car Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Category</th>
        <th>Manufacturer</th>
        <th>Date Added</th>
        <th>Actions</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['Car_id']}</td>
                <td>{$row['Car_name']}</td>
                <td>{$row['Description']}</td>
                <td>{$row['Price']}</td>
                <td>{$row['Quantity']}</td>
                <td>{$row['Category']}</td>
                <td>{$row['Manufacturer']}</td>
                <td>{$row['DateAdded']}</td>
                <td>
                    <form method='post'>
                        <input type='hidden' name='car_id' value='{$row['Car_id']}'>
                        <input type='text' name='new_price' placeholder='New Price'>
                        <input type='submit' name='update' value='Update'>
                    </form>
                    <form method='post'>
                        <input type='hidden' name='car_id' value='{$row['Car_id']}'>
                        <input type='submit' name='delete' value='Delete'>
                    </form>
                </td>
            </tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$connection->close();
?>
