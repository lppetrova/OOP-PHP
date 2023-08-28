<?php
class Database {

    private $host;
    private $username;
    private $password;
    private $dbname;
    private $pdo;

    public function __construct($host, $username, $password, $dbname){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->connect();
    }

    private function connect() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";

        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function executeQuery($query, $params = array()) {
        $stmt = $this->pdo->prepare($query);
        if ($stmt === false) {
            die("Error in prepared statement: " . $this->pdo->errorInfo()[2]);
        }
        $stmt->execute($params);
        return $stmt;
    }

    // Create new user 
    public function create($username, $email, $role) {
        $sql = "INSERT INTO users_php (username, email, role) VALUES (?, ?, ?)";
        $params = [$username, $email, $role];
        return $this->executeQuery($sql, $params);
    }

    // Update user 
    public function update($id, $username, $email, $role) {
        $sql = "UPDATE users_php SET username = ?, email = ?, role = ? WHERE id = ?";
        $params = [$username, $email, $role, $id];
        return $this->executeQuery($sql, $params);
    }

    // Delete user 
    public function delete($id) {
        $sql = "DELETE FROM users_php WHERE id = ?";
        $params = [$id];
        return $this->executeQuery($sql, $params);
    }
}

?>
