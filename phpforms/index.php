<?php
include 'db.php';
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: login.php');
    exit;
}
$result = $conn->query("SELECT * FROM task");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    
</head>
<body>
<div class="container">
    <h1>Tasks</h1>
    <a href="create.php">Add New Task</a>
    <a href="logout.php">lOGOUT</a>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>User ID</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['taskid'] ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><?= $row['start_date'] ?></td>
                <td><?= $row['end_date'] ?></td>
                <td><?= $row['userid'] ?></td>
                <td class="actions">
                    <a class="edit" href="update.php?taskid=<?= $row['taskid'] ?>">Edit</a>
                    <a class="delete" href="delete.php?taskid=<?= $row['taskid'] ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
