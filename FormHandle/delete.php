<?php
include("db.php");
$id = $_GET["id"];
$query = "DELETE FROM users WHERE userid = '$id'";
$result = mysqli_query($conn, $query);

?>
<html>
<head>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/formhandling/display.php">
</head>

</html>