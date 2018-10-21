<html>
  <head>
    <title>
      Edit Project
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
                $projectID = $_POST["ProjectID"];
                $select = $_POST["select"];

                $Check = "SELECT * FROM Projects WHERE ProjectID = '$projectID'";
                $result = $conn->query($Check);

                if($select == 'Name'){
                    $name = $_POST['input'];
                    $sql = "UPDATE Projects SET Name = '$name' WHERE ProjectID = '$projectID'";

                    if ($result->num_rows > 0) {
                    $conn->query($sql);
                        if (mysqli_query($conn, $sql)) {
                            echo "Record updated successfully<br>";
                        } else {
                            echo "Error updating record: " . mysqli_error($conn);
                        }
                    } else{
                        echo "There is no project with the name : " . $projectID . ".<br>";
                        echo "<a href = 'EditProject.php'>Try Again</a><br>";

                    }
                }elseif ($select == 'StartDate') {
                    $startDate = $_POST['input'];
                    $sql = "UPDATE Projects SET StartDate= '$startDate' WHERE ProjectID = '$projectID'";

                    if ($result->num_rows > 0) {
                    $conn->query($sql);
                        if (mysqli_query($conn, $sql)) {
                            echo "Record updated successfully<br>";
                        } else {
                            echo "Error updating record: " . mysqli_error($conn);
                        }
                    } else{
                      echo "There is no project with the name : " . $projectID . ".<br>";
                      echo "<a href = 'EditProject.php'>Try Again</a><br>";
                    }
                  } elseif ($select == 'TotalTaskDays') {
                      $days = $_POST['input'];
                      $sql = "UPDATE Projects SET TotalTaskDays = '$days' WHERE ProjectID = '$projectID'";

                      if ($result->num_rows > 0) {
                      $conn->query($sql);
                          if (mysqli_query($conn, $sql)) {
                              echo "Record updated successfully<br>";
                          } else {
                              echo "Error updating record: " . mysqli_error($conn);
                          }
                      } else{
                        echo "There is no project with the name : " . $projectID . ".<br>";
                        echo "<a href = 'EditProject.php'>Try Again</a><br>";
                      }
                  } else{
                      echo "There is no project with that name<br>";
                      echo "<a href = 'CreateProject.php'>Add Branch</a>";
                  }
            }
            $msg = "Go to <a href = 'http://localhost:8080/CmpE321/Admin/AdminHomePage.php'>Admin Page</a>";
            echo $msg;
            die();
        }
?>
  </body>
</html>
