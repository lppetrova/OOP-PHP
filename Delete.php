<?php
require_once 'Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['id'];

    $db = new Database("localhost", "username", "password", "test");

    $result = $db->delete($user_id);

    if ($result) {
        echo "User deleted successfully!";
    } else {
        echo "Error deleting user: " . $db->executeQuery($sql)->errorInfo()[2];
    }

    $db = null; 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
</head>
<body>
    <h1>Delete User</h1>
    <form method="post" action="">
        <label for="id">User ID:</label>
        <input type="text" id="id" name="id" required><br>

        <input type="submit" value="Delete User">
    </form>
    <form action="usermanagement.php">
        <input type="submit" value="Back to User Management">
    </form>
</body>
</html>
