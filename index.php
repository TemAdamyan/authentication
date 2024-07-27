<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Welcome to the User Authentication System</h1>
        <div class="text-center mt-4">
            <?php if (isset($_SESSION['user'])): ?>
                <a href="protected.php" class="btn btn-primary">Go to Protected Page</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            <?php else: ?>
                <a href="register.php" class="btn btn-success">Register</a>
                <a href="login.php" class="btn btn-info">Login</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>