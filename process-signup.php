<?php

  if(empty($_POST["name"])){
    die("Name is required");
  }
  if(! filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
    die("valid email is required");
  }
  if(strlen($_POST["password"]) < 8){
    die("Password must be at least 8 characters");
  }
  if(! preg_match("/[a-z]/i", $_POST["password"])){
    die("password must contain at least one letter");
  }
  if(! preg_match("/[0-9]/i", $_POST["password"])){
    die("password must contain at least one number");
  }
  if($_POST["password"] !== $_POST["password_confirmation"]){
    die("password must match");
  }
  $password_hash = password_hash($_POST["password"],PASSWORD_DEFAULT);
  var_dump($password_hash);
?>