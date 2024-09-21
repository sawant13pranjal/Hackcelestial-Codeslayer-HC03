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
    $p_code = $_POST['Pcode'];
    $p_name = $_POST['Pname'];
    $c_code = $_POST['Ccode'];
    $c_name = $_POST['Cname'];
    $year = $_POST['year'];

    $sql = "INSERT INTO `form1.1` (p_code, p_name, c_code, c_name, year) 
            VALUES ('$p_code', '$p_name', '$c_code', '$c_name', '$year')";

    if ($conn->query($sql) === TRUE) {
        // Store the last inserted Sr.no into the session
        $_SESSION['submitted_id'] = $conn->insert_id;  // Get the inserted row's primary key
        echo "<script>
                alert('Submitted Successfully!');
                window.location.href = '1.1db.php'; 
              </script>";
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
