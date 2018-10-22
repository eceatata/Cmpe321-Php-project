<html>
  <head>
        <title>
          Project Manager Home Page
        </title>
    </head>
    <body>
		<?php
  		session_start();
  		session_destroy();
    	header("Location:http://localhost:8080/CmpE321/ProjectManager/LogIn.php");
		?>
	</body>
</html>
