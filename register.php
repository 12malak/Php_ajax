<?php

// Assuming you've received POST data securely

  $UserName= $_POST["UserName"];
  $password= $_POST["password"];
  $email= $_POST["email"];


  
  if(empty($UserName) || empty($password) || empty($email)){
    echo 2;
    exit;
  }
// Create a database connection
$conn = new mysqli("localhost", "root", "", "Login");



// Bind the parameters and their types
// "sss" indicates that you're binding three string values 

$stmt = $conn->prepare("insert into users values(? ,? ,?);");
$stmt->bind_param("sss", $UserName ,$password ,$email );

// Execute the prepared statement
$stmt->execute();

echo 1;