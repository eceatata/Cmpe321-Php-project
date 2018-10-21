<!DOCTYPE html>
<html>
	<head>
		<title>
      Edit Project
		</title>
	</head>
	<body>
		 <?php
        session_start();

        if (!isset($_SESSION['Name'])) {
          $msg = "Please <a href = 'http://localhost:8080/CmpE321/Admin/AdminLogIn.php'>log in</a> to view this page";
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

		        	echo "The table below  shows the Project in our system <br>";

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
		        }
		        echo "Please fill the blanks with the new informations about the corresponding record.<br>";
		         ?>

		        <form action='EditProjectRecord.php' method='post'>
		         <p>ProjectID:
		            <select name = "ProjectID">
		            <?php
		            $sql2 = mysqli_query($conn , "SELECT ProjectID FROM Projects");
		            while ($row = $sql2->fetch_assoc()) {
		                echo "<option value = \"".$row['ProjectID']."\">" . $row['ProjectID']. "</option>";
		            }
		                mysqli_close($conn);
		            ?>
		            </select>
		         </p>
		         <p>Edit =>
		            <select name = 'select'>
		                <option value = 'Name'>Name</option>
		                <option value = 'StartDate'>StartDate</option>
		                <option value = 'TotalTaskDays'>TotalTaskDays</option>
		            </select>
		         </p>
		         <p>Enter new value<input name  = 'input'></p>
		         <p><input type='submit' /></p>
		        </form>
				 <?php
		         die();
		     }
         echo  "<a href = 'http://localhost:8080/CmpE321/Admin/AdminHomePage.php'>Home</a>";
        ?>
	</body>
</html>
