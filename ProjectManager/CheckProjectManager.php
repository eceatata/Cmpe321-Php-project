<html>
    <head>
        <title>
          Project Manager Home Page
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

    $sql = "SELECT * FROM ProjectManagers WHERE ProjectManagerName = '" . $name . "' AND Password = '" . $pass . "' " ;

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      session_start();

      $_SESSION['Name'] = $name;
      $result2 = $conn->query("SELECT ID FROM ProjectManagers WHERE ProjectManagerName = '" . $name . "' AND Password = '" . $pass . "' ");

      $my_id_array=mysqli_fetch_assoc($result2);
      $_SESSION['AdminID'] = $my_id_array['ID'];

      header("Location:http://localhost:8080/CmpE321/ProjectManager/HomePage.php");
      die();
    }else{
      $conn->close();
      //die("Wrong username or password");
      $msg = "Wrong username or password, Please <a href = 'http://localhost:8080/CmpE321/ProjectManager/LogIn.php'>try again</a>";
      echo $msg;
      die();
    }
  }

?>
    </body>
</html>
