<!DOCTYPE html>
<html>
	<head>
		<title>
      Edit Project Manager
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

		        	echo "The table below  shows the Project Manager in our system <br>";

		        	$sql = "SELECT * FROM ProjectManagers";
		        	$result = $conn->query($sql);

		        	echo "<table border = '1'>
		        	<tr>
		        	<th>ProjectManagerName</th>
		        	<th>Password</th>
		        	</tr>";

		        	while ($row = mysqli_fetch_array($result)) {
		        		//echo "<tr>";
		        		echo "<td>". $row['ProjectManagerName'] . "</td>".
		        		"<td>". $row['Password'] . "</td></tr>";
		        		//echo "</tr>";
		        	}
		        	echo "</table>";
		        }
		        echo "Please fill the blanks with the new informations about the corresponding record.<br>";
		         ?>

		        <form action='EditPMRecord.php' method='post'>
		         <p>ProjectManagerName:
		            <select name = "ProjectManagerName">
		            <?php
		            $sql2 = mysqli_query($conn , "SELECT ProjectManagerName FROM ProjectManagers");
		            while ($row = $sql2->fetch_assoc()) {
		                echo "<option value = \"".$row['ProjectManagerName']."\">" . $row['ProjectManagerName']. "</option>";
		            }
		                mysqli_close($conn);
		            ?>
		            </select>
		         </p>
		         <p>Edit =>
		            <select name = 'select'>
		                <option value = 'ProjectManagerName'>ProjectManagerName</option>
		                <option value = 'Password'>Password</option>
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
