<?php
    session_start();

    if(isset($_SESSION["user_id"])){
        $mysqli = require __DIR__ . "/database.php";
        $sql = "SELECT * FROM user
                WHERE id = {$_SESSION["user_id"]}";
        
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>Sign up success</title>
  </head>
  <body>
    <h1>Home</h1>
    <?php if(isset($user)): ?>
        <p>You are logged in</p>
        <p>Hello <?= htmlspecialchars($user["name"]) ?> </p>
        <p><a href="logout.php">Log out</a></p>
    <?php else: ?>
        <p><a href="login.php">Log in</a> or <a href="index.html">Sign in</a></p>
    <?php endif; ?>
  </body>
</html>
