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
    <style>
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

        .form input[type="text"],
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

        .form p {
        margin-top: 20px;
        text-align: center;
        }

        .form a {
        color: #4CAF50;
        font-weight: 600;
        text-decoration: none;
        }

        .form a:hover {
        text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="server.php" method="post" class="form" onsubmit="return validateForm()">

        <label for="text">Name:</label>
        <input type="text" name="text" id="name">
        <span id="nameError" class="error"></span><br>

        <label>Email:</label>
        <input type="email" name="email" id="email">
        <span id="emailError" class="error"></span><br>

        <label>Password:</label>
        <input type="password" name="password" id="password">
        <span id="passwordError" class="error"></span><br>
        
        <label>Confirm Password:</label>
        <input type="password" name="check_password" id="confirm_password">
        <span id="confirmPasswordError" class="error"></span><br>

        <input type="submit" name="register" value="Register">

        <p>Already registered? <a href="login.php">Sign in</a></p>

    </form>
        
</div>

<script>
    function validateForm() {
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("confirm_password").value;

        var nameError = document.getElementById("nameError");
        var emailError = document.getElementById("emailError");
        var passwordError = document.getElementById("passwordError");
        var confirmPasswordError = document.getElementById("confirmPasswordError");

        nameError.innerHTML = "";
        emailError.innerHTML = "";
        passwordError.innerHTML = "";
        confirmPasswordError.innerHTML = "";

        var isValid = true;

        if (name.trim() == "") {
            nameError.innerHTML = "Please enter your name.";
            document.getElementById("name").style.borderColor = "red";
            isValid = false;
        }

        if (email.trim() == "") {
            emailError.innerHTML = "Please enter your email address.";
            document.getElementById("email").style.borderColor = "red";
            isValid = false;
        } else {
            var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!pattern.test(email)) {
                emailError.innerHTML = "Please enter a valid email address.";
                document.getElementById("email").style.borderColor = "red";
                isValid = false;
            }
        }

        if (password.trim() == "") {
            passwordError.innerHTML = "Please enter your password.";
            document.getElementById("password").style.borderColor = "red";
            isValid = false;
        } else if (password.length < 6) {
            passwordError.innerHTML = "Password should be at least 6 characters long.";
            document.getElementById("password").style.borderColor = "red";
            isValid = false;
        }

        if (confirm_password.trim() == "") {
            confirmPasswordError.innerHTML = "Please confirm your password.";
            document.getElementById("confirm_password").style.borderColor = "red";
            isValid = false;
        } else if (password != confirm_password) {
            confirmPasswordError.innerHTML = "Passwords do not match.";
            document.getElementById("confirm_password").style.borderColor = "red";
            isValid = false;
        }

        return isValid;
    }
</script>

    
</body>
</html>