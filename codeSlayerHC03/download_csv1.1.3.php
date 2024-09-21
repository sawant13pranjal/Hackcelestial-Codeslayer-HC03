<?php
// Database connection
$servername = "localhost";  
$username = "root";         
$password = "";     
$dbname = "naac_db";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set headers to download the file as a CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Criteria_1.1_Data.csv');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Output the title as the first row
fputcsv($output, ['1.1.3 Teachers of the Institution participate in following activities related to curriculum development and assessment of the affiliating University and/are represented on the following academic bodies during the year']);

// Output the column headings
fputcsv($output, ['Sr.No', 'Year', 'Name of teacher participated', 'Name of the body in which full time teacher participated']);

// Fetch data from MySQL
$sql = "SELECT * FROM `form1.1.3`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop over the rows and output them
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, [$row['Sr.no'], $row['year'], $row['teacher_name'], $row['participation_body']]);
    }
} else {
    fputcsv($output, ['No data found']);
}

// Close the database connection
$conn->close();
?>
