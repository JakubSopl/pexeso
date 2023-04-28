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
            .container {
            width: 100%;
            height: 500px;
            display: flex;
            flex-wrap: wrap;
            justify-content:center;           
            background-image: url('images/background.jpg');
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
                margin=0;
                padding=0;              
            }

            h3{
                margin-right: 100px;
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

                <br><br>

                <button type="button"><a href="leaderboard.php">leaderboard</a></button>

                <br><br>

                <form method="post">
                <label for="size">Enter the grid size:</label>
                <input type="number" name="size" id="size" required>
                <input type="submit" name="submit" value="Create Grid">
                </form>


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