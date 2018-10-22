<!DOCTYPE html>
<html>
    <head>
        <title>
          Search Procedure
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
                $name = $_POST["ProjectManagerName"];

                $sql = "CALL SearchComplete('$name')" ;
                $result = $conn->query($sql);

                $err = mysqli_error($conn);

                echo $err;

                echo "<table border = '1'>
                <tr>
                <th>ProjectManagerName</th>
                <th>ProjectID</th>
                <th>Name</th>
                <th>StartDate</th>
                <th>TotalTaskDays</th>
                </tr>";

                while ($row = mysqli_fetch_array($result)) {
                  //echo "<tr>";
                  echo "<td>". $row['ProjectManagerName'] . "</td>".
                  "<td>". $row['ProjectID'] . "</td>".
                  "<td>". $row['Name'] . "</td>".
                  "<td>". $row['StartDate'] . "</td>".
                  "<td>". $row['TotalTaskDays'] . "</td></tr>";
                  //echo "</tr>";
                }
                echo "</table>";

                $conn->close();
                $msg = "Projects are searched. Click here to go back <a href = 'http://localhost:8080/CmpE321/Admin/AdminHomePage.php'> Admin Home Page </a>";
                echo $msg;
            }
        }
        die();
?>
    </body>
</html>
