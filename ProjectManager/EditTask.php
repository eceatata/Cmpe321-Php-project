<!DOCTYPE html>
<html>
	<head>
		<title>
      Edit Task
		</title>
	</head>
	<body>
		 <?php
        session_start();

        if (!isset($_SESSION['Name'])) {
          $msg = "Please <a href = 'http://localhost:8080/CmpE321/ProjectManager/LogIn.php'>log in</a> to view this page";
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

		        	echo "The table below  shows the task in our system <br>";

		        	$sql = "SELECT * FROM Tasks";
		        	$result = $conn->query($sql);

		        	echo "<table border = '1'>
		        	<tr>
		          <th>TaskID</th>
		          <th>StartDate</th>
		        	<th>TotalTaskDays</th>
		        	</tr>";

		        	while ($row = mysqli_fetch_array($result)) {
		        		//echo "<tr>";
		        		echo "<td>". $row['TaskID'] . "</td>".
		            "<td>". $row['StartDate'] . "</td>".
		            "<td>". $row['TotalTaskDays'] . "</td></tr>";
		        		//echo "</tr>";
		        	}
		        	echo "</table>";
		        }
		        echo "Please fill the blanks with the new informations about the corresponding record.<br>";
		         ?>

		        <form action='EditTaskRecord.php' method='post'>
		         <p>ProjectID:
		            <select name = "TaskID">
		            <?php
		            $sql2 = mysqli_query($conn , "SELECT TaskID FROM Tasks");
		            while ($row = $sql2->fetch_assoc()) {
		                echo "<option value = \"".$row['TaskID']."\">" . $row['TaskID']. "</option>";
		            }
		                mysqli_close($conn);
		            ?>
		            </select>
		         </p>
		         <p>Edit =>
		            <select name = 'select'>
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
         echo  "<a href = 'http://localhost:8080/CmpE321/ProjectManager/LogIn.php'>Home</a>";
        ?>
	</body>
</html>
