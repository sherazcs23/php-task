<?php
include("db.php");
?>
<html>
<head>

    <title>Form Handling</title>
</head>
<body>
<form  method="POST">
<label for="">Username :</label>
<input type="text" placeholder="Enter Username" name="username" required >
<label for="">Password</label>  
<input type="password" placeholder="Enter Password" name="password" required>
<label for="">Email</label>
<input type="email" placeholder="Enter Email" name="email" required >
<button type="submit" >Submit</button>
</form>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $querry = "INSERT INTO users (username,password,email) VALUES('$username','$password','$email')";
    $result = mysqli_query($conn,$querry);

}
?>
    
<button><a href="display.php">Show User</a></button>
</body>
</html>