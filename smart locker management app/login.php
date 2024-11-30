<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM auth WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: view_lockers.php");
    } else {
        echo "Invalid email or password.";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    <label>Email:    </label>
    <input type="email" name="email" required>
    <br> <br>
    <label>Password: </label>
    <input type="password" name="password" required>
    <br> <br>
    <button type="submit">Login</button>
</form>
