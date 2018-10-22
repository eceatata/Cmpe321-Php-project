<html>
    <head>
        <title>
          Project Manager Home Page
        </title>
    </head>
    <body>
      <?php
        session_start();

        if (!isset($_SESSION['Name'])) {
          $msg = "Please <a href = 'http://localhost:8080/CmpE321/ProjectManager/LogIn.php'>log in</a> to view this page";
          echo $msg;
        }else{
          echo "Project Management System ";
          echo "Welcome " . $_SESSION['Name'] ;
        $msq = "
			<ul>
        <li> <a href='http://localhost:8080/CmpE321/ProjectManager/CreateTask.php'>Create Task</a></li>
        <li> <a href='http://localhost:8080/CmpE321/ProjectManager/EditTask.php'>Edit Task</a></li>
        <li> <a href='http://localhost:8080/CmpE321/ProjectManager/DeleteTask.php'>Delete Task</a></li>

        <li> <a href='http://localhost:8080/CmpE321/ProjectManager/AssingTaskToEmployee.php'>Assing Task To Employee Task</a></li>
			</ul>";


		echo $msq;
        $ms = "<br> Click <a href = 'LogOut.php'>here</a> to log out.";
        echo $ms;

      die();
        }
      ?>
    </body>
</html>
