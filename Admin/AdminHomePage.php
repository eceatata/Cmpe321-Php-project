<html>
    <head>
        <title>
          Administrator Home Page
        </title>
    </head>
    <body>
      <?php
        session_start();

        if (!isset($_SESSION['Name'])) {
          $msg = "Please <a href = 'http://localhost:8080/CmpE321/Admin/AdminLogIn.php'>log in</a> to view this page";
          echo $msg;
        }else{
        echo "Welcome to the Project Management System " . $_SESSION['Name'] ;

        $msq = "
			<ul>
        <li> <a href='http://localhost:8080/CmpE321/Admin/CreateProjectManager.php'>Create Project Manager</a></li>
        <li> <a href='http://localhost:8080/CmpE321/Admin/EditProjectManager.php'>Edit Project Manager</a></li>
        <li> <a href='http://localhost:8080/CmpE321/Admin/DeleteProjectManager.php'>Delete Project Manager</a></li>

        <li> <a href='http://localhost:8080/CmpE321/Admin/AssingProjectToPM.php'>Assign Project to Project Manager</a></li>
        <li> <a href='http://localhost:8080/CmpE321/Admin/SearchComplete.php'>Show Complete Project</a></li>
        <li> <a href='http://localhost:8080/CmpE321/Admin/SearchIncomplete.php'>Show Incomplete Project</a></li>

        <li> <a href='http://localhost:8080/CmpE321/Admin/CreateProject.php'>Create Project</a></li>
        <li> <a href='http://localhost:8080/CmpE321/Admin/EditProject.php'>Edit Project</a></li>
        <li> <a href='http://localhost:8080/CmpE321/Admin/DeleteProject.php'>Delete Project</a></li>

        <li> <a href='http://localhost:8080/CmpE321/Admin/CreateEmployee.php'>Create Employee</a></li>
        <li> <a href='http://localhost:8080/CmpE321/Admin/EditEmployee.php'>Edit Employee</a></li>
        <li> <a href='http://localhost:8080/CmpE321/Admin/DeleteEmployee.php'>Delete Employee</a></li>
			</ul>";


		echo $msq;
        $ms = "<br> Click <a href = 'AdminLogOut.php'>here</a> to log out.";
        echo $ms;

      die();
        }
      ?>
    </body>
</html>
