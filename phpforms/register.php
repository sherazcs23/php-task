<?php
session_start();
include('db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];
    $inputEmail = $_POST['email'];
    $sql = "INSERT INTO user (username, password, email) VALUES ('$inputUsername', '$inputPassword', '$inputEmail')"; 
    if ($conn->query($sql) === TRUE) {
        $_SESSION['loggedIn'] = true;   
        header('Location: index.php');   
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h1>Login Page</h1>
    <form action="" method="post">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <?php if (isset($error)) { echo '<p style="color:red;">' . $error . '</p>'; } ?>
</body>
</html>
