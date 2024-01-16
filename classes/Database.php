<?php

class Database {

    private $db = null;
    public $error = false;

    public function __construct($host, $username, $pass, $db) {
        try {
            $this->db = new mysqli($host, $username, $pass, $db);
            $this->db->set_charset("utf8");
        } catch (Exception $exc) {
            $this->error = true;
            echo '<p>Az adatbázis nem elérhető!</p>';
            exit();
        }
    }

    public function osszesAuto() {
        $result = $this->db->query("SELECT * FROM `jarmuvek`");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAuto($id) {
        $result = $this->db->query("SELECT * FROM `jarmuvek` WHERE id = " . $id);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getKiemeltAjanlatok() {
        $result = $this->db->query("SELECT * FROM `jarmuvek`");
        return $result->fetch_all(MYSQL_ASSOC);
    }

    public function login($username, $password) {
        // Prepare and bind the SQL statement
        $stmt = $this->db->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);

        // Execute the SQL statement
        $stmt->execute();

        // Bind the result variables
        $stmt->bind_result($user_id, $db_username, $db_password);

        // Fetch the result
        $stmt->fetch();

        // Close the connection
        $stmt->close();

        if ($db_username) {
        // Verify the password
        if (password_verify($password, $db_password)) {
            session_start();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $db_username;
            echo "<script>alert('Sikeres bejelentkezés!'); window.location.href='index.php';</script>";
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
}

    public function register($email, $username, $password) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind the SQL statement 
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

// Execute the SQL statement 
        if ($stmt->execute()) {
            echo "New account created successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

// Close the connection 
        $stmt->close();
    }
}
