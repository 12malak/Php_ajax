<?php

// Assuming you've received POST data securely

  $UserName= $_POST["UserName"];
  $password= $_POST["password"];


// Create a database connection
$conn = new mysqli("localhost", "root", "", "Login");



$stmt = $conn->prepare("select * from users where UserName=? and password=? ");
$stmt->bind_param("ss", $UserName ,$password );

// Execute the prepared statement
$stmt->execute();
$result = $stmt->get_result();

if ($result ->num_rows>0)
echo 1;
else
echo 0;