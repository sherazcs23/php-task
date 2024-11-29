<html>
<head>
    <title>User Information</title>
</head>
<body>
<h1>Your email is <?php 
if (isset($_POST["email"])) {
  $email2 = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
  // Optionally validate the email format
  if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
      // Handle invalid email format
  }
}
?>
</h1>

</body>
</html>