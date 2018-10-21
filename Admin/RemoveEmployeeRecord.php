<html>
  <head>
    <title>
      Remove Employee
    </title>
  </head>
  <body>
    <?php
        session_start();
        if (!isset($_SESSION['Name'])) {
          $msg = "Please <a href = 'http://localhost:8080/CmpE321/Admin/AdminLogIn.php'>log in</a> to view this page";
          echo $msg;
        }else{
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
                $id = $_POST["EmployeeID"];
                $sql = "DELETE FROM Employees WHERE EmployeeID = '$id'";

                $conn->query($sql);
                if (mysqli_query($conn, $sql)) {
                    echo "Record updated successfully<br>";
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
                echo "Go to <a href = 'http://localhost:8080/CmpE321/Admin/AdminHomePage.php'>Home<a/>";
            }
            die();
        }
?>
  </body>
</html>
