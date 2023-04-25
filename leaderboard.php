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
	</style>
</head>
<body>
	<h1>Leaderboard</h1>
        <?php

        @include 'database.php';


        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Step 2: Retrieve data
        $sql = "SELECT name, score FROM scores ORDER BY score DESC LIMIT 10";
        $result = mysqli_query($conn, $sql);

        // Step 3: Display data
        echo "<table>";
        echo "<tr><th>Name</th><th>Score</th></tr>";

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["name"]. "</td><td>" . $row["score"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No results found</td></tr>";
        }

        echo "</table>";

        // Close connection
        mysqli_close($conn);

        ?>
</body>
</html>