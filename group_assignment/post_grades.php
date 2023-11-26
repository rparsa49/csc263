<!DOCTYPE html>
<html>
    <head>
        <title>PHP Connect MySQL Database</title>
    </head>
    <body>
        <h1>PHP Connect MySQL Database</h1>
        <p><?php
                $servername = "localhost";
                $username = "root";
                $password = "AlfieHershey";
                $database = "grades";
                $port = "3308";

                $conn = new mysqli($servername, $username, $password, $database, $port);

                if ($conn->connect_error) {
                    die("<p style='color:red'>" . "Connection Failed: " . $conn->connect_error . "</p>");
                }

                //echo "MySQL DB Connected successfully... <br>";

                    $courseid = $_POST['courseid'];
                    $studentid = $_POST['studentid'];
                    $term = $_POST['term'];
                    $grade = $_POST['grade'];
                
                    $sql = "INSERT INTO `GRADES` VALUES('$courseid', '$studentid', '$term', '$grade');";

                    if($insert = $conn->query($sql) === TRUE) {
                        echo "Grades successfully uploaded!";
                    }
                    else {
                        echo "Error!";
                    }

                $conn->close();

                //echo "<br> DB Disconnect";
        ?></p>

        <div>
            <a href="home.html">Return Home</a>
        </div>
    </body>
</html>