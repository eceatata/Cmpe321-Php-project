<html>
<body>
<?php
include("connection.php");

session_start();
$_SESSION["login"] = 0;
$username=$_POST['username'];
$password=$_POST['password'];
$username=mysqli_real_escape_string($conn,$username);
$password=mysqli_real_escape_string($conn,$password);
$sql="SELECT * FROM student WHERE password='$password' AND username='$username'";

	if(!$conn->query($sql)->num_rows>0){
		$sql="SELECT * FROM admin WHERE password='$password' AND username='$username'";
		if(!$conn->query($sql)->num_rows>0){
			echo "Mismatch username and password";
		}else{
			$_SESSION["login"] = $username;
			header('Location: adminhome.php');  
			exit();
		}
		
	}else{
		echo "Welcome";
		$_SESSION["login"] = $username;
		header('Location: stuhome.php');
		exit();
		
	}
	
?>


</body>

</html>