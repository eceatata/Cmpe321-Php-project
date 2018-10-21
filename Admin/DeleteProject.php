<!DOCTYPE html>
<html>
	<head>
		<title>
			Delete Project
		</title>
	</head>
	<body>
		 <?php
         session_start();

        if (!isset($_SESSION['Name'])) {
          $msg = "Please <a href = 'http://localhost:8080/CmpE321/Admin/AdminLogOut.php'>log in</a> to view this page";
          echo $msg;
        }else{
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "CmpE321";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }else{

              	echo "The table below  shows the project in our system <br>";
              	echo "Enter the name of the project that you want to delete<br>";

              	$sql = "SELECT * FROM Projects";
              	$result = $conn->query($sql);

              	echo "<table border = '1'>
              	<tr>
              	<th>ProjectID</th>
                <th>Name</th>
                <th>StartDate</th>
                <th>TotalTaskDays</th>
              	</tr>";

              	while ($row = mysqli_fetch_array($result)) {
              		//echo "<tr>";
									echo "<td>". $row['ProjectID'] . "</td>".
			            "<td>". $row['Name'] . "</td>".
			            "<td>". $row['StartDate'] . "</td>".
			            "<td>". $row['TotalTaskDays'] . "</td></tr>";
              		//echo "</tr>";
              	}

              	echo "</table>";
      		      echo "<form action='RemoveProjectRecord.php' method='post'>".
                    "<p>ProjectID:
                    <select name = 'ProjectID'>";

                $sql2 = mysqli_query($conn , "SELECT ProjectID FROM Projects");
                while ($row = $sql2->fetch_assoc()) {
                    echo "<option value = \"".$row['ProjectID']."\">" . $row['ProjectID']. "</option>";
                }

                echo "</select>
                  </p>
                  <p><input type='submit' /></p>
                  </form>";

                echo "<a href = 'http://localhost:8080/CmpE321/Admin/AdminHomePage.php'>Home</a>";
                die();
            }
        }
        ?>
	</body>
</html>
