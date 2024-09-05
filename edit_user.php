<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'login_db');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    $user = $result->fetch_assoc();
}

// Update user data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $conn->query("UPDATE users SET username='$username' WHERE id=$id");
    header("Location: users.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        Username: <input type="text" name="username" value="<?php echo $user['username']; ?>" required><br><br>
        <button type="submit">Update User</button>
    </form>
    <br>
    <a href="users.php">Back to User List</a>
</body>
</html>
