<!DOCTYPE html>
<html>
    <head>
        <title>Receive Transcript</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                color: #333;
                text-align: center;
                margin: 50px;
            }

            h1 {
                color: #0066cc;
            }

            table {
                border-collapse: collapse;
                width: 100%;
                margin-top: 20px;
            }

            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }

            a {
                display: inline-block;
                padding: 10px 20px;
                margin: 10px;
                text-decoration: none;
                color: #fff;
                background-color: #4caf50;
                border-radius: 5px;
            }

            a:hover {
                background-color: #45a049;
            }
        </style>
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

                    $sql_grades = "SELECT COURSES.coursename, GRADES.term, GRADES.grade 
                                    FROM `GRADES` 
                                    JOIN `STUDENTS` ON GRADES.studentid = STUDENTS.studentid
                                    JOIN `COURSES` ON GRADES.courseid = COURSES.courseid
                                    WHERE STUDENTS.studentid = '$id';";
                    $result_grades = $conn->query($sql_grades);

                    $table = $result_grades->fetch_all();

                    if(!$result_grades) {
                        echo "<br> Bummer! " . $conn->error;
                    }
                    else {
                        echo "<table>";
                        echo "<tr><th>Course Name</th><th>Term</th><th>Grade</th></tr>";
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
