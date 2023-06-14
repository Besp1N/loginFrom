<?php

    $is_invalid = false;

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $mysqli = require __DIR__ . "/database.php";
        $sql = sprintf("SELECT * FROM user
                        WHERE email = '%s'",
                        $mysqli->real_escape_string($_POST["email"]));

        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
        
        if($user){
           if( password_verify($_POST["password"], $user["password_hash"])){
             die("Login successful");
           }
        }
        $is_invalid = true;
    } 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
  </head>
  <body>
    <h1>Login</h1>

    <?php if($is_invalid): ?>
        <em>Invalid Login</em>
    <?php endif; ?>
    
    <div class="glass">
        <form method="post">
          <div class="field glass">
            <input type="email" id="email" name="email" placeholder="email"/>
          </div>
          <div class="field glass">
            <input type="password" id="password" name="password" placeholder="password"/>
          </div>
          <button type="submit">Login</button>
        </form>
    </div>
  </body>
</html>
