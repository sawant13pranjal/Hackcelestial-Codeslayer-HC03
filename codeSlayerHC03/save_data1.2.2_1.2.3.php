<?php
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

    $acer = $_POST['Acer'];
    $c_code = $_POST['Ccode'];
    $year1 = $_POST['year1'];
    $nt = $_POST['Ntime'];
    $dc = $_POST['Dcou'];
    $ns = $_POST['Nstu'];
    $nc = $_POST['Ncom'];
    $year2 = $_POST['year2'];

    $sql = "INSERT INTO `form1.2.2_1.2.3` (acer, c_code, year1, nt, dc, ns, nc, year2 ) 
            VALUES ('$acer', '$c_code', '$year1', '$nt', '$dc', '$ns', '$nc','$year2')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Submitted Successfully!');
                window.location.href = '1.2.2_1.2.3db.php'; 
              </script>";
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
