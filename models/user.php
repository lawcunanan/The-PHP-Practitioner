<?php

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function signup($username, $password)
    {
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE username = :u");
        $stmt->execute(['u' => $username]);

        if ($stmt->fetch()) {
            return "exists";
        }

        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare(
            "INSERT INTO users (username, password) VALUES (:u, :p)"
        );

        return $stmt->execute(['u' => $username, 'p' => $hashed])
            ? "success"
            : "error";
    }

    public function signin($username, $password)
    {
        $stmt = $this->pdo->prepare("SELECT password FROM users WHERE username = :u");
        $stmt->execute(['u' => $username]);
        $row = $stmt->fetch();

        if (!$row) {
            return "not_found";
        }

        if (password_verify($password, $row['password'])) {
            return "success";
        }

        return "invalid_password";
    }


    public function resetPassword($username, $new_password)
    {
        $hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare(
            "UPDATE users SET password = :p WHERE username = :u"
        );

        return $stmt->execute(['p' => $hashed, 'u' => $username])
            ? "success"
            : "error";
    }


    public function deleteUser($username)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE username = :u");
        return $stmt->execute(['u' => $username])
            ? "success"
            : "error";
    }

    public function getAllUsers()
    {
        $stmt = $this->pdo->prepare("SELECT id, username, reg_date FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
