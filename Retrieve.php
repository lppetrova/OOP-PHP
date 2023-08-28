<?php
require_once 'Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $db = new Database("localhost", "root", "password", "test");

    $sql = "SELECT * FROM users_php WHERE id = ?";
    $params = [$user_id];
    $result = $db->executeQuery($sql, $params);
    
    if ($result->rowCount() > 0) {
        $user = $result->fetch();
        echo var_dump($user);
        echo "User ID: " . $user->ID . "<br>";
        echo "Username: " . $user->Username . "<br>";
        echo "Email: " . $user->Email . "<br>";
        echo "Role: " . $user->Role . "<br>";
    } else {
        echo "User not found!";
    }

    $db = null; 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Get User by ID</title>
</head>
<body>
    <h1>Get User by ID</h1>
    <form method="get" action="">
        <label for="id">User ID:</label>
        <input type="text" id="id" name="id" required><br>

        <input type="submit" value="Get User">
    </form>
        <form action="usermanagement.php">
        <input type="submit" value="Back to User Management">
    </form>
</body>
</html>
