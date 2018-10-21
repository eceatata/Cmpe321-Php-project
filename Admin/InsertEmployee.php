<html>
    <head>
        <title>
          Create Employee
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

    $sql = "INSERT INTO Employees (Name)
                  VALUES ('$name')" ;
    $result = $conn->query($sql);

    $conn->close();
    $msg = "Employee is created. Click here to go back <a href = 'http://localhost:8080/CmpE321/Admin/AdminHomePage.php'> Admin Home Page </a>";
    echo $msg;
  }

?>
    </body>
</html>
