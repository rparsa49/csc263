<!DOCTYPE html>
<html>
    <head>
        <title>Receive Transcript</title>
    </head>
    <body>
        <h1>Receive Transcript</h1>
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

                // echo "MySQL DB Connected successfully... <br>";

                    $id = $_POST['id'];

                    $sql_name = "SELECT firstname, lastname FROM `STUDENTS` WHERE studentid = '$id';";
                    $result_name = $conn->query($sql_name);

                    if(!$result_name) {
                        //echo "<br> Bummer! " . $conn->error;
                    }
                    else {
                        $name = $result_name->fetch_assoc();
                        $first_name = $name['firstname']; // Error line 33
                        $last_name = $name['lastname']; // Error line 34
                        echo $first_name . " " . $last_name . "'s Transcript";
                    }

                    $sql_grades = "SELECT courseid, term, grade 
                                    FROM `GRADES` 
                                    JOIN `STUDENTS` ON grades.studentid = students.studentid
                                    WHERE students.studentid = '$id';";
                    $result_grades = $conn->query($sql_grades);

                    $table = $result_grades->fetch_all();

                    if(!$result_grades) {
                        echo "<br> Bummer! " . $conn->error;
                    }
                    else {
                        echo "<table>";
                        foreach ($table as $row) {
                            echo "<tr>";
                            foreach ($row as $col) {
                                echo "<td>$col</td>";
                            }   
                            echo "</tr>";
                        }
                        echo "</table>";
                    }

                // echo "<br> DB Disconnect";
                $conn->close();
        ?></p>

        <div>
            <a href="home.html">Return Home</a>
        </div>
    </body>
</html>