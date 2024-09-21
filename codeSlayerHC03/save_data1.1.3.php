<?php
session_start(); // Start session to store submission details

// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'naac_db';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $year = $_POST['year'];
    $teacher_name = $_POST['tname'];
    $participation_body = $_POST['tpart'];

    $sql = "INSERT INTO `form1.1.3` (year, teacher_name, participation_body) 
            VALUES ('$year', '$teacher_name', '$participation_body')";

    if ($conn->query($sql) === TRUE) {
        // Store the last inserted Sr.no into the session
        $_SESSION['submitted_id'] = $conn->insert_id;  // Get the inserted row's primary key
        echo "<script>
                alert('Submitted Successfully!');
                window.location.href = '1.1.3db.php'; 
              </script>";
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
