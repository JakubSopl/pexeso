<?php
include 'database.php';
session_start();

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $name = $_POST['text'];
    $password = $_POST['password'];
    $check_password = $_POST['check_password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        require 'registrace.php';
        echo 'Email již v databázy existuje!';
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (full_name, email, password) VALUES ('$name' ,'$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo 'Registrace proběhla úspěšně!';
            header('Location: login.php');
        }
    }
} elseif (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            echo 'Přihlášení proběhlo úspěšně!';
            $_SESSION['user_id'] = $row['full_name']; 

            header('Location: index1.php');
        } else {
            require 'login.php';
            echo '<p class="error" style="color:red">špatné heslo </p>';
        }
    } else {
        require 'login.php';
        echo '<p class="error" style="color:red">špatný email </p>';
    }
} else if(isset($_POST['NoLogin'])){
    require 'index1.php';

}  else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_SESSION['user_id'];
        $score = $_POST['score'];
        if ($user_id != 0) {
            $sql = "INSERT INTO scores (name, score) VALUES ('$user_id', '$score')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo 'Data byla úspěšně uložena!';
            } else {
                echo 'Data se nepodařilo uložit!';
            }
        }
    }
}
?>