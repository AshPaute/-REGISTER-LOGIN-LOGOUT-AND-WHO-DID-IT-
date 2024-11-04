<?php
include('session.php');
include('db.php');

$customer_id = $_GET['id'];

$stmt = $mysqli->prepare("DELETE FROM customers WHERE customer_id = ? AND added_by = ?");
$stmt->bind_param("ii", $customer_id, $_SESSION['user_id']);

if ($stmt->execute()) {
    echo "Customer deleted successfully!";
} else {
    echo "Error deleting customer: " . $stmt->error;
}

header("Location: view_customers.php");
exit();
?>
