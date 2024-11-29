<?php
include("db.php");
$id = $_GET["id"];

$query = "SELECT * FROM users WHERE userid = '$id'";

$result = mysqli_query($conn, $query);

$data = mysqli_fetch_assoc($result);

?>
<html>
<head>
 
    <title>Form Handling</title>
</head>
<body>
<form  method="POST">
<label for="">Username :</label>
<input type="text" placeholder="Enter Username" value="<?php echo $data['username']; ?>" name="username" required >
<label for="">Password</label>  
<input type="password" placeholder="Enter Password" value="<?php echo $data['password']; ?>" name="password" required>
<label for="">Email</label>
<input type="email" placeholder="Enter Email" name="email" required >
<button type="submit" name="update" >Update</button>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $querry = "UPDATE users SET username = '$username', password = '$password', email = '$email' WHERE userid = '$id'";
    $result = mysqli_query($conn,$querry);
}



?>

<button><a href="display.php">Back</a></button>

</body>
</html>