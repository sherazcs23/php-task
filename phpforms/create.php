<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $user_id = $_POST['user_id'];
    $conn->query("INSERT INTO task (title, description, start_date, end_date, userid) VALUES ('$title', '$description', '$start_date', '$end_date', '$user_id')");
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    
</head>
<body>
<div class="container">
    <h1>Create Task</h1>
    <form method="post">
        <input type="text" name="title" placeholder="Title">
        <textarea name="description" placeholder="Description"></textarea>
        <input type="date" name="start_date" placeholder="Start Date">
        <input type="date" name="end_date" placeholder="End Date">
        <input type="number" name="user_id" placeholder="User Id">
        <button type="submit">Create</button>
    </form>
    <br><a href="index.php">Back to Tasks</a>
</div>
</body>
</html>
