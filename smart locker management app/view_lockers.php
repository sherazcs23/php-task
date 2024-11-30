<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM locker WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$lockers = $stmt->fetchAll();
?>

<h2>Your Lockers</h2>
<a href="add_locker.php">Add Locker</a> | <a href="logout.php">Logout</a>
<table border="1">
    <tr>
        <th>Locker Name</th>
        <th>Combination Code</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($lockers as $locker): ?>
    <tr>
        <td><?= htmlspecialchars($locker['locker_name']) ?></td>
        <td><?= htmlspecialchars($locker['combination_code']) ?></td>
        <td>
            <a href="update_locker.php?id=<?= $locker['id'] ?>">Edit</a>
            <a href="delete_locker.php?id=<?= $locker['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
