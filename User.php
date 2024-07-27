<?php

require_once 'db.php';

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function register($username, $password, $firstname, $lastname, $email) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password, firstname, lastname, email) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$username, $hash, $firstname, $lastname, $email]);
    }

    public function login($username, $password) {
        $stmt = $this->pdo->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $hash = $stmt->fetchColumn();
        return password_verify($password, $hash);
    }

    public function isLoggedIn() {
        return isset($_SESSION['user']);
    }

    public function setSession($username) {
        $_SESSION['user'] = $username;
    }

    public function logout() {
        unset($_SESSION['user']);
    }
}

?>