<?php
// Database connection

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";  
$username = "root";         
$password = "";     
$dbname = "naac_db";  

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `form1.2.2_1.2.3` ";  
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Sr.no'] . "</td>";  
        echo "<td>" . $row['acer'] . "</td>";  
        echo "<td>" . $row['c_code'] . "</td>";  
        echo "<td>" . $row['nt'] . "</td>";  
        echo "<td>" . $row['dc'] . "</td>";  
        echo "<td>" . $row['ns'] . "</td>";  
        echo "<td>" . $row['nc'] . "</td>";  
        echo "<td>" . $row['year2'] . "</td>";  
        echo "<td><a href='edit.php?id=" . $row['Sr.no'] . "'>Edit</a></td>";
        echo "<td><input type='text' placeholder='Add Comment' id='comment'></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No data available</td></tr>";
}

$conn->close();
?>
