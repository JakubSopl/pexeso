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
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
       
    <form action="server.php" method="POST" class="form">
        <label>Email:</label>
        <input type="email" name="email"><br>
        <label>Heslo:</label>
        <input type="password" name="password"><br>
        <input type="submit" name="login" value="Přihlásit se">
    </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
     <div><p>Play unregistered <a href="index1.php">Play here</a></p></div>
    </div>
</body>
</html>