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

                echo "MySQL DB Connected successfully... <br>";

                $sql = "SELECT * FROM `STUDENTS`;";
                $result = $conn->query($sql);

                if(!$result) {
                    echo "<br> Bummer! " . $conn->error;
                }
                else {
                    echo "<br> The result has " . $result->num_rows . " rows. <br>";
                }

                $conn->close();

                echo "<br> DB Disconnect";
        ?></p>
    </body>
</html>