<?php

// Assuming you've received POST data securely

$UserName = $_POST["UserName"];
$password = $_POST["password"];

// Create a database connection
$conn = new mysqli("localhost", "root", "", "Login");

$stmt = $conn->prepare("select password from users where UserName = ?");
$stmt->bind_param("s", $UserName);

// Execute the prepared statement
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['password'];

    // Verify the entered password against the hashed password
    if (password_verify($password, $hashedPassword)) {
        echo 1; // Successful login
    } else {
        echo 0; // Incorrect password
    }
} else {
    echo 2; // User not found
}

// Close the database connections
$stmt->close();
$conn->close();
?>
