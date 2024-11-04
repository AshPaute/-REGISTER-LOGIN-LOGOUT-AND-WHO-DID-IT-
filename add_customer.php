<?php
include('session.php');
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $stmt = $mysqli->prepare("INSERT INTO customers (name, phone, added_by) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $phone, $_SESSION['user_id']);
    
    if ($stmt->execute()) {
        echo "Customer added successfully!";
    } else {
        echo "Error adding customer: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Customer</title>
</head>
<body>
    <h2>Add Customer</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required>
        
        <input type="submit" value="Add Customer">
    </form>
    <a href="javascript:history.back()">Back</a>
</body>
</html>
