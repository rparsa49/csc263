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

        $coursename = $_POST['coursename'];
        $credits = $_POST['credits'];
        $studentid = $_POST['studentid'];
        $term = $_POST['term'];
        $grade = $_POST['grade'];

        // Insert course into COURSES table
        $insertCourseSQL = "INSERT INTO `COURSES` (coursename, credits) VALUES ('$coursename', '$credits');";
        if ($conn->query($insertCourseSQL) === TRUE) {
            // Retrieve the courseid of the inserted course
            $courseid = $conn->insert_id;

            // Insert grade into GRADES table
            $insertGradeSQL = "INSERT INTO `GRADES` (courseid, studentid, term, grade) VALUES ('$courseid', '$studentid', '$term', '$grade');";

            if ($conn->query($insertGradeSQL) === TRUE) {
                echo "Grades successfully uploaded!";
            } else {
                echo "Error inserting grade: " . $conn->error;
            }
        } else {
            echo "Error inserting course: " . $conn->error;
        }

        $conn->close();

        //echo "<br> DB Disconnect";
    ?></p>

    <div>
        <a href="home.html">Return Home</a>
    </div>
</body>
</html>
