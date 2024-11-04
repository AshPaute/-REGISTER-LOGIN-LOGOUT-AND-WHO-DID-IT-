<?php
include('session.php');
include('db.php');

$stmt = $mysqli->prepare("SELECT customer_id, name, phone, last_updated FROM customers WHERE added_by = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Customers</title>
</head>
<body>
    <h2>Customers List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Last Updated</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['customer_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['last_updated']; ?></td>
            <td>
                <a href="update_customer.php?id=<?php echo $row['customer_id']; ?>">Edit</a>
                <a href="delete_customer.php?id=<?php echo $row['customer_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="add_customer.php">Add New Customer</a>
    <a href="javascript:history.back()">Back</a>
</body>
</html>
