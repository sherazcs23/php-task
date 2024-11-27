<?php
session_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<?php
 include("db.php");
 $id = $_GET["taskid"];
 $query = "DELETE  FROM task WHERE taskid = '$id'";
 $result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
<head>
    <!-- // server request to reresh and move to  the server/url page // -->
    <meta http-equiv ="refresh" content = "0; url = http://localhost/phpforms/index.php">
</head>

</html>