<?php
$servername = "localhost";
$username = "root";
$password = "AlfieHershey";
$database = "grades";
$port = "3308";

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("<p style='color:red'>" . "Connection Failed: " . $conn->connect_error . "</p>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];

    $sql = "INSERT INTO STUDENTS (lastname, firstname, dob) VALUES ('$lastname', '$firstname', '$dob');";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
