<?php
include('session.php');
include('db.php');

// Get username for display
$stmt = $mysqli->prepare("SELECT username FROM users WHERE user_id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coffee Shop - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome to the Coffee Shop, <?php echo htmlspecialchars($username); ?>!</h1>
    <a href="view_customers.php">View Customers</a>
    <a href="logout.php">Logout</a>
    <a href="javascript:history.back()">Back</a>
</body>
</html>
