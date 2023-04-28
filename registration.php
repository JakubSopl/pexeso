<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <form action="server.php" method="post" class="form">

        <label for="text">napiš jmeno kurva</label>
        <input type="text" name="text"><br>

        <label>Email:</label>
        <input type="email" name="email"><br>

        <label>Password:</label>
        <input type="password" name="password"><br>
        
        <label>Confirm Password:</label>
        <input type="password" name="check_password"><br>

        <input type="submit" name="register" value="Register">

        <p>Already a member? <a href="login.php">Sign in</a></p>

    </form>
        <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
      </div>
    </div>
</body>
</html>