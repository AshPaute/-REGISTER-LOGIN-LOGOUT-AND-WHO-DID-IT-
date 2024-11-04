<?php
include('session.php');
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $stmt = $mysqli->prepare("UPDATE customers SET name = ?, phone = ? WHERE customer_id = ? AND added_by = ?");
    $stmt->bind_param("ssii", $name, $phone, $customer_id, $_SESSION['user_id']);
    
    if ($stmt->execute()) {
        echo "Customer updated successfully!";
    } else {
        echo "Error updating customer: " . $stmt->error;
    }
} else {
    // Fetch existing data for pre-population
    $customer_id = $_GET['id'];
    $stmt = $mysqli->prepare("SELECT name, phone FROM customers WHERE customer_id = ? AND added_by = ?");
    $stmt->bind_param("ii", $customer_id, $_SESSION['user_id']);
    $stmt->execute();
    $stmt->bind_result($name, $phone);
    $stmt->fetch();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Customer</title>
</head>
<body>
    <h2>Update Customer</h2>
    <form method="post" action="">
        <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" required>
        
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>" required>
        
        <input type="submit" value="Update Customer">
    </form>
    <a href="javascript:history.back()">Back</a>
</body>
</html>
