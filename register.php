<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'login_db');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password
    $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New User</title>
</head>
<body>
    <h2>Register New User</h2>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Register</button>
    </form>
    <br>
    <!-- <a href="users.php">Back to User List</a> -->
    <a href="login.php">Login</a>
</body>
</html>
