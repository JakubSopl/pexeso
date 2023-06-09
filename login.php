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
    <style>
    body {
        background-color: #f7f7f7;
        font-family: 'Helvetica Neue', sans-serif;
    }

    .container {
        max-width: 500px;
        margin: 50px auto;
        background-color: #f9f9f9;
        padding: 30px;
        border-radius: 10px;
    }

    .form label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .form input[type="email"],
    .form input[type="password"] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
    }

    .form input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin-top: 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
    }

    .form input[type="submit"]:hover {
        background-color: #45a049;
    }

    p {
        margin-top: 20px;
        text-align: center;
    }

    a {
        color: #4CAF50;
        font-weight: 600;
        text-decoration: none;
        }

    a:hover {
        text-decoration: underline;
    }
    </style>

    
</head>
<body>
       
    <div class="container">
       
    <form action="server.php" method="POST" class="form" onsubmit="return validateForm()">
    <label>Email:</label>
    <input type="email" name="email" id="email"><br>
    <span id="email-error"></span>
    <label>Heslo:</label>
    <input type="password" name="password" id="password"><br>
    <span id="password-error"></span>
    <input type="submit" name="login" value="Přihlásit se">  
    </form>

    <div>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
     <div><p>Play unregistered <a href="index1.php">Play here</a></p></div>
    </div>

    </div>

    <script>
        function validateForm() {
        var email = document.getElementById("email");
        var password = document.getElementById("password");
        var valid = true;

        if (email.value == "") {
            email.style.borderColor = "red";
            document.getElementById("email-error").innerHTML = "Prosím vyplňte e-mailovou adresu.";
            valid = false;
        }
        else if (!isValidEmail(email.value)) {
            email.style.borderColor = "red";
            document.getElementById("email-error").innerHTML = "Zadejte prosím platnou e-mailovou adresu.";
            valid = false;
        }
        else {
            email.style.borderColor = "";
            document.getElementById("email-error").innerHTML = "";
        }

        if (password.value == "") {
            password.style.borderColor = "red";
            document.getElementById("password-error").innerHTML = "Prosím vyplňte heslo.";
            valid = false;
        }
        else if (password.value.length < 6) {
            password.style.borderColor = "red";
            document.getElementById("password-error").innerHTML = "Vaše heslo je příliš krátké. Musí mít alespoň 6 znaků.";
            valid = false;
        }
        else {
            password.style.borderColor = "";
            document.getElementById("password-error").innerHTML = "";
        }

        return valid;
        }

        function isValidEmail(email) {
            var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }
    </script>
</body>
</html>