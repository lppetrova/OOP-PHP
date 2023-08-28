<?php
require_once 'Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['id'];
    $fieldToUpdate = $_POST['field_to_update'];
    $newValue = $_POST['new_value'];

    $db = new Database("localhost", "root", "password", "test");

    $sql = "";
    $params = [];

    switch ($fieldToUpdate) {
        case 'username':
            $sql = "UPDATE users_php SET username = ? WHERE id = ?";
            $params = [$newValue, $user_id];
            break;
        case 'email':
            $sql = "UPDATE users_php SET email = ? WHERE id = ?";
            $params = [$newValue, $user_id];
            break;
        case 'role':
            $sql = "UPDATE users_php SET role = ? WHERE id = ?";
            $params = [$newValue, $user_id];
            break;
        default:
            echo "Invalid field selected.";
            break;
    }

    if (!empty($sql)) {
        $result = $db->executeQuery($sql, $params);

        if ($result) {
            echo "User field updated successfully!";
        } else {
            echo "Error updating user field: " . $db->executeQuery($sql)->errorInfo()[2];
        }
    }

    $db = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User Field</title>
</head>
<body>
    <h1>Update User Field</h1>
    <form method="post" action="">
        <label for="id">User ID:</label>
        <input type="text" id="id" name="id" required><br>

        <label for="field_to_update">Field to Update:</label>
        <select id="field_to_update" name="field_to_update">
            <option value="username">Username</option>
            <option value="email">Email</option>
            <option value="role">Role</option>
        </select><br>

        <label for="new_value">New Value:</label>
        <input type="text" id="new_value" name="new_value" required><br>

        <input type="submit" value="Update User Field">
    </form>
    <form action="usermanagement.php">
        <input type="submit" value="Back to User Management">
    </form>
</body>
</html>
