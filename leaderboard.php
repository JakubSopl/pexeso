<!DOCTYPE html>
<html>
<head>
	<title>Leaderboard</title>
	<style>
		table {
			border-collapse: collapse;
			width: 50%;
			margin: 0 auto;
		}

		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}

		th {
			background-color: #4CAF50;
			color: white;
		}

		tr:hover {
			background-color: #f5f5f5;
		}

        h1{
            text-align: center;
            margin-bottom: 50px;
            margin-top: 45px;
        }
	</style>
</head>
<body>
	<h1>Leaderboard</h1>
        <?php

        @include 'database.php';


        //connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // data
        $sql = "SELECT name, MAX(score) as score FROM scores GROUP BY name ORDER BY score DESC LIMIT 10";
        $result = mysqli_query($conn, $sql);

        
        echo "<table>";
        echo "<tr><th>Name</th><th>Score</th></tr>";

        if (mysqli_num_rows($result) > 0) {
            // vypis
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["name"]. "</td><td>" . $row["score"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No results found</td></tr>";
        }

        echo "</table>";

        
        mysqli_close($conn);

        ?>
</body>
</html>