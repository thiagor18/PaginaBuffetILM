<?php
require 'db.php';

function registerUser($username, $email, $password) {
    global $conn;
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);
    return $stmt->execute();
}

function loginUser($usernameOrEmail, $password) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
}

function deleteUser($usernameOrEmail, $password) {
    global $conn;
    $user = loginUser($usernameOrEmail, $password);
    if ($user) {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user['id']);
        return $stmt->execute();
    }
    return false;
}

?>
