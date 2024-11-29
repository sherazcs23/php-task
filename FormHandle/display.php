<?php
include("db.php");

$querry = "SELECT * FROM users";
$result = mysqli_query($conn,$querry);
$total = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <table>
    <tr>
        <th>User id</th>
        <th>User Name</th>
        <th>Password</th>
        <th>Email</th>
        <th>Action</th>

    </tr>
    <?php
    for($i=1; $i <= $total; $i++){
        $row = mysqli_fetch_array($result);
        echo "<tr>";
        echo "<td>".$row["userid"]."</td>";
        echo "<td>".$row["username"]."</td>";
        echo "<td>".$row["password"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td><a href='update.php?id=$row[userid]'>Update</a> | <a href='delete.php?id=$row[userid]'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
   </table> 

<button><a href="index.php">Add uSERS</a></button>
</body>
</html>