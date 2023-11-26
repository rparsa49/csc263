<!DOCTYPE html>
<html>

<head>
    <title>Student Registration</title>
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

        p.success {
            color: #4caf50;
        }

        p.error {
            color: #f44336;
        }
    </style>
</head>

<body>
    <h1>Student Registration</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "AlfieHershey";
    $database = "grades";
    $port = "3308";

    $conn = new mysqli($servername, $username, $password, $database, $port);

    if ($conn->connect_error) {
        die("<p class='error'>" . "Connection Failed: " . $conn->connect_error . "</p>");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];

        $sql = "INSERT INTO STUDENTS (lastname, firstname, dob) VALUES ('$lastname', '$firstname', '$dob');";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Registration successful!</p>";
        } else {
            echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }

    $conn->close();
    ?>
</body>

</html>
