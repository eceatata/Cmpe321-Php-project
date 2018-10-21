<html>
  <head>
        <title>
          Admin Home Page
        </title>
    </head>
    <body>
		<?php
  		session_start();
  		session_destroy();
    	header("Location:http://localhost:8080/CmpE321/Admin/AdminLogIn.php");
		?>
	</body>
</html>
