<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $locker_name = $_POST['locker_name'];
    $combination_code = $_POST['combination_code'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO locker (user_id, locker_name, combination_code) VALUES (:user_id, :locker_name, :combination_code)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':locker_name', $locker_name);
    $stmt->bindParam(':combination_code', $combination_code);

    if ($stmt->execute()) {
        echo "Locker added successfully!";
    } else {
        echo "Error adding locker.";
    }
}
?>

<h2>Add Locker</h2>
<form method="POST">
    <label>Locker Name:</label>
    <input type="text" name="locker_name" required>
    <label>Combination Code:</label>
    <input type="text" name="combination_code" required>
    <button type="submit">Add Locker</button>
</form>
