<?php
session_start();  // Start session to access user's submitted ID

// Database connection
$servername = "localhost";  
$username = "root";         
$password = "";     
$dbname = "naac_db";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `form1.1` ";  
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Sr.no'] . "</td>";  
        echo "<td>" . $row['p_code'] . "</td>";  
        echo "<td>" . $row['p_name'] . "</td>";  
        echo "<td>" . $row['c_code'] . "</td>";  
        echo "<td>" . $row['c_name'] . "</td>";  
        echo "<td>" . $row['year'] . "</td>";  

        // Check if this is the user's submitted row
        if (isset($_SESSION['submitted_id']) && $_SESSION['submitted_id'] == $row['Sr.no']) {
            echo "<td><a href='edit.php?id=" . $row['Sr.no'] . "'>Edit</a></td>";
        } else {
            echo "<td></td>";  // Leave empty for other rows
        }

        // echo "<td><input type='text' placeholder='Add Comment' id='comment'></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No data available</td></tr>";
}

$conn->close();
?>
