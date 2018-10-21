<html>
    <head>
        <title>
          Create Project Manager
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
    $pass = $_POST["pass"];

    $sql = "INSERT INTO ProjectManagers (ProjectManagerName, Password)
                  VALUES ('$name', '$pass')" ;
    $result = $conn->query($sql);

    $conn->close();
    $msg = "Project Manager created. Click here to go back <a href = 'http://localhost:8080/CmpE321/Admin/AdminHomePage.php'> Admin Home Page </a>";
    echo $msg;
  }

?>
    </body>
</html>
