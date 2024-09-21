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
fputcsv($output, ['1.1 Number of courses offered by the Institution across all programs during the year']);

// Output the column headings
fputcsv($output, ['Sr.No', 'Program Code', 'Program Name', 'Course Code', 'Course Name', 'Year of Introduction']);

// Fetch data from MySQL
$sql = "SELECT * FROM `form1.1`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop over the rows and output them
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, [$row['Sr.no'], $row['p_code'], $row['p_name'], $row['c_code'], $row['c_name'], $row['year']]);
    }
} else {
    fputcsv($output, ['No data found']);
}

// Close the database connection
$conn->close();
?>
