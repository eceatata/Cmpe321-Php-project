<html>
  <head>
    <title>
      Edit Project Manager
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
                $projectManagerName = $_POST["ProjectManagerName"];
                $select = $_POST["select"];

                $Check = "SELECT * FROM ProjectManagers WHERE ProjectManagerName = '$projectManagerName'";
                $result = $conn->query($Check);

                if($select == 'ProjectManagerName'){

                    $name = $_POST['input'];
                    $sql = "UPDATE ProjectManagers SET ProjectManagerName = '$name' WHERE ProjectManagerName = '$projectManagerName'";

                    if ($result->num_rows > 0) {
                      $conn->query($sql);
                          if (mysqli_query($conn, $sql)) {
                              echo "Record updated successfully<br>";
                          } else {
                              echo "Error updating record: " . mysqli_error($conn);
                          }
                      } else{
                          echo "There is no project manager with the name : " . $projectManagerName . ".<br>";
                          echo "<a href = 'EditProjectManager.php'>Try Again</a><br>";

                      }
                  } else if($select == 'Password'){

                      $name = $_POST['input'];
                      $sql = "UPDATE ProjectManagers SET Password = '$name' WHERE ProjectManagerName = '$projectManagerName'";

                      if ($result->num_rows > 0) {
                        $conn->query($sql);
                            if (mysqli_query($conn, $sql)) {
                                echo "Record updated successfully<br>";
                            } else {
                                echo "Error updating record: " . mysqli_error($conn);
                            }
                        } else{
                            echo "There is no record with the id : " . $projectManagerName . ".<br>";
                            echo "<a href = 'EditDoctor.php'>Try Again</a><br>";

                        }
                    } else{
                      echo "There is no project manager with that name<br>";
                      echo "<a href = 'CreateProjectManager.php'>Add Branch</a>";
                  }

            }
                $msg = "Go to <a href = 'http://localhost:8080/CmpE321/Admin/AdminHomePage.php'>Admin Page</a>";
                echo $msg;
            die();
        }
    ?>
  </body>
</html>
