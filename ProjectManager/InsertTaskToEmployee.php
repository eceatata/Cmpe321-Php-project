<html>
    <head>
        <title>
          Insert Task to Employee
        </title>
    </head>
    <body>
      <?php
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
          $TaskID = $_POST["TaskID"];
          $EmployeeID = $_POST["EmployeeID"];

          $sql = "INSERT INTO TaskFromEmployee (TaskID, EmployeeID)
                        VALUES ('$TaskID', '$EmployeeID')" ;
          $result = $conn->query($sql);

          $conn->close();
          $msg = "TaskFromEmployee is created. Click here to go back <a href = 'http://localhost:8080/CmpE321/ProjectManager/HomePage.php'> Admin Home Page </a>";
          echo $msg;
      }

?>
    </body>
</html>
