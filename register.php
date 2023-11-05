<?php
// Assuming you've received POST data securely
$UserName = $_POST["UserName"];
$password = $_POST["password"];
$email = $_POST["email"];

// Validate that the inputs are not empty
if (empty($UserName) || empty($password) || empty($email)) {
    echo 1; // Empty field(s)
    exit;
}

// Validate email format
if (!preg_match('/^\S+@\S+\.\S+$/', $email)) {
    echo 7; // Invalid email format
    exit;
}
// Validate password: It must be at least 8 characters long and contain a mix of letters, numbers, and special characters.
if (strlen($password) < 8 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[!@#\$%^&*()\-_+=<>?]/', $password)) {
    echo 6; // Invalid password format
    exit;
}

// Create a database connection
$conn = new mysqli("localhost", "root", "", "Login");

// Check if the email already exists in the database
$emailCheck = $conn->prepare("SELECT * FROM users WHERE email = ?");
$emailCheck->bind_param("s", $email);
$emailCheck->execute();
$emailCheck->store_result();

if ($emailCheck->num_rows > 0) {
    echo 3; // Email already exists
    exit;
}

// Encrypt the password using password_hash
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Insert the user data into the database
$stmt = $conn->prepare("INSERT INTO users (UserName, password, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $UserName, $hashedPassword, $email);

if ($stmt->execute()) {
    echo 2; // Registration successful
} else {
    echo 4; // Registration failed
}

// Close the database connections
$stmt->close();
$conn->close();
?>
