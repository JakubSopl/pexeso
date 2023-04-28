<?php
session_start();
//if (!isset($_SESSION["user"])) {
//   header("Location: login.php");
//}
?>
<!DOCTYPE html>
    <html>
        <head>

        <title>Title</title>           

            <style>

            
            html, body {
            height: 100%;
            }

            body {
            background-image: url('images/background3.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            }

            .container {
            width: 100%;
            height: 500px;
            display: flex;
            flex-wrap: wrap;
            justify-content:center;           
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            }

            .card {
            width: 150px;
            height: 150px;
            margin: 20px;
             
            
                  
            }

            #grid {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
            }

            * {
                margin: 0;
                padding: 0;              
            }

            h3{
                margin-right: 100px;
                margin-top: 70px;
                font-size: 25px;
                line-height: 1.5;
            }

            .my-btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
            cursor: pointer;
            height: 60px;
            margin-top: 50px;
            margin-left: 30px;
            }

            .my-btn:hover {
            background-color: #3e8e41;
            }

            form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-right: 250px;
            margin-left: 230px;
            }

            label {
            font-size: 18px;
            margin-bottom: 10px;

            }

            input[type="number"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-bottom: 20px;
            width: 200px;
            }

            input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            }

            input[type="submit"]:hover {
            background-color: #3e8e41;
            }
            

            </style>

<script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
        </head>
        <body>

            <div class="container">

                <h3>Skore: <span id="result"></span></h3>

                <form method="post">
                <label for="size">Enter the grid size:</label>
                <input type="number" name="size" id="size" required>
                <input type="submit" name="submit" value="Create Grid">
                </form>

                <button type="button" class="my-btn"><a href="leaderboard.php">leaderboard</a></button>

                <div id="grid">
            
                </div>

            </div>

            

            <script src="app.js"></script>

            <?php

            if(isset($_POST['submit'])){
            $size = $_POST['size'];
            for($i=0; $i<$size; $i++){
                echo '<div id="grid">';
                for($j=0; $j<$size; $j++){
                echo '<div id="grid"></div>';
                }
                echo '</div>';
            }
            }
            ?>

        </body>
    </html>