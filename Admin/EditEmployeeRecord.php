<html>
  <head>
    <title>
      Edit Employee
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
                $employeeID = $_POST["EmployeeID"];
                $select = $_POST["select"];

            $Check = "SELECT * FROM Employees WHERE EmployeeID = '$employeeID'";
            $result = $conn->query($Check);

            if($select == 'Name'){

                $name = $_POST['input'];
                $sql = "UPDATE Employees SET Name = '$name' WHERE EmployeeID = '$employeeID'";

                if ($result->num_rows > 0) {

                $conn->query($sql);

                    if (mysqli_query($conn, $sql)) {
                        echo "Record updated successfully<br>";
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }
                } else{
                    echo "There is no record with the id : " . $employeeID . ".<br>";
                    echo "<a href = 'EditEmployee.php'>Try Again</a><br>";

                }
            }else{
                echo "There is no branch with that name<br>";
                echo "<a href = 'CreateEmployee.php'>Create Employee</a>";
               }

            }
            $msg = "Go to <a href = 'http://localhost:8080/CmpE321/Admin/AdminHomePage.php'>Admin Page</a>";
            echo $msg;

        die();
        }
    ?>
  </body>
</html>
