<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION["email"]; ?></h2>
    <p>This is your user dashboard.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
