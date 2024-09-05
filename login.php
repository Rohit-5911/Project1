<?php
session_start(); // Start session
$conn = new mysqli('localhost', 'root', '', 'login_db'); // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch user by username
    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $result->fetch_assoc();

    // Check if user exists and verify password
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username; // Store username in session
        header("Location: users.php"); // Redirect to welcome page
    } else {
        echo "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <br>
    <a href="register.php">Register</a>
</body>
</html>
