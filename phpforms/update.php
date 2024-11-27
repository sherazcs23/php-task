<?php
include 'db.php';
$task_id = $_GET['taskid'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $conn->query("UPDATE task SET title='$title', description='$description', start_date='$start_date', end_date='$end_date'  WHERE taskid=$task_id");
    header('Location: index.php');
}
$result = $conn->query("SELECT * FROM task WHERE taskid=$task_id");
$task = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Update Task</h1>
    <form method="post">
        <input type="text" name="title" value="<?= $task['title'] ?>">
        <textarea name="description"><?= $task['description'] ?></textarea>
        <input type="date" name="start_date" value="<?= $task['start_date'] ?>">
        <input type="date" name="end_date" value="<?= $task['end_date'] ?>">
        <button type="submit">Update</button>
    </form>
    <br><a href="index.php">Back to Tasks</a>
</div>
</body>
</html>
