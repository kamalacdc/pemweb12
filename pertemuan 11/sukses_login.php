<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Login</title>
    <link rel="stylesheet" type="text/css" href="stel.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Success Page</h1>
        <p>Username: <?php echo htmlspecialchars($username); ?></p>
        <p>Email: <?php echo htmlspecialchars($email); ?></p>
        <form action="logout.php" method="POST">
            <button type="submit" class="btn">Logout</button>
        </form>
    </div>
</body>
</html>
