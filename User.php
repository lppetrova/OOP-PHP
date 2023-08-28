<?php
class User {
    private $id;
    private $username;
    private $email;
    private $role;

    public function __construct($id, $username, $email, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
    }

    // Getter and Setter methods
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setRole($role) {
        $this->role = $role;
    }
}

// Simple web interface
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission to create a new user
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $user = new User($id, $username, $email, $role);

    // You can now store or manage the user object as needed, e.g., in a database.
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Management System</title>
</head>
<body>
    <h1>Create User</h1>
    <form method="post" action="">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" required><br>

        <input type="submit" value="Create User">
    </form>
</body>
</html>
