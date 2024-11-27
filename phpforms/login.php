<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];
    
    $result = $conn->query("SELECT username,password FROM user");

    while ($row = $result->fetch_assoc()) {
        if ($row['username'] == $inputUsername && $row['password'] == $inputPassword) {
            $_SESSION['loggedIn'] = TRUE;   
            header('Location: index.php');   
        } else {
            $error = 'Invalid username or password';    
        }
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
        <input type="text" name="username"><br><br>
        <label>Password:</label>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Login">
        <p>Don't Have An Account? <a href="register.php">Register</a></p>
    </form>
    <?php if (isset($error)) { echo '<p style="color:red;">' . $error . '</p>'; } ?>
</body>
</html>
