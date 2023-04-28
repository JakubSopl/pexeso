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
                margin: 0;
                padding: 0;              
            }

            h3{
                margin-right: 100px;
            }

            

            </style>
        </head>
        <body>

            <div class="container">

                <h3>Skore: <span id="result"></span></h3>

                <br><br>

                <button type="button"><a href="leaderboard.php">leaderboard</a></button>

                <div id="grid">
            
                </div>

            </div>

            

            <script src="app.js"></script>
        </body>
    </html>