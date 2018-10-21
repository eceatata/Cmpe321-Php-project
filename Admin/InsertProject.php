<html>
    <head>
        <title>
          Create Project
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
          $name = $_POST["name"];
          $startDate = $_POST["startDate"];
          $totalTaskDays = $_POST["totalTaskDays"];

          $sql = "INSERT INTO Projects (Name, StartDate, TotalTaskDays)
                        VALUES ('$name', '$startDate', '$totalTaskDays')" ;
          $result = $conn->query($sql);

          $conn->close();
          $msg = "Project is created. Click here to go back <a href = 'http://localhost:8080/CmpE321/Admin/AdminHomePage.php'> Admin Home Page </a>";
          echo $msg;
      }

?>
    </body>
</html>
