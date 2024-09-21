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
fputcsv($output, ['1.2.2 Number of Add on /Certificate programs offered during the year']);
fputcsv($output, ['1.2.3 Number of students enrolled in Certificate/ Add-on programs as against the total number of students during the year']);

// Output the column headings
fputcsv($output, ['Sr.No', 'Name of Add on /Certificate programs offered*', 'Course Code', 'Year of Offering', 'No. of times offered during the same year', 'Duration of course', 'Number of Students completing the course in the year', 'Which year (Year 1)']);

// Fetch data from MySQL
$sql = "SELECT * FROM `form1.2.2_1.2.3`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop over the rows and output them
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, [$row['Sr.no'], $row['acer'], $row['c_code'], $row['year1'], $row['nt'], $row['dc'], $row['ns'], $row['nc'], $row['year2']]);
    }
} else {
    fputcsv($output, ['No data found']);
}

// Close the database connection
$conn->close();
?>
