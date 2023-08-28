<?php
require_once 'Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid or empty email address.";
    }

    if (empty($errors)) {
        $db = new Database("localhost", "root", "password", "test");

        $result = $db->create($username, $email, $role);

        if ($result) {
            echo "User added successfully!";
        } else {
            echo "Error adding user: " . $db->executeQuery($sql)->errorInfo()[2];
        }

        $db = null; // Close the database connection
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>
    <h1>Add User</h1>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role"><br>

        <input type="submit" value="Add User">
    </form>
    <form action="usermanagement.php">
        <input type="submit" value="Back to User Management">
    </form>
</body>
</html>
