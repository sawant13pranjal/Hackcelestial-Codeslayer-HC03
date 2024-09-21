<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="1.2.2_1.2.3db.css">
    <title>1.2.2_1.2.3 database</title>
</head>
<body>
    <div class="nav-bar">
        <nav>
            <div class="logo"></div>
            <div class="text">
                <h4>PSPS's</h4>
                <h2>Rajendra Mane College of Engineering & Technology</h2>
                <h3>Ambav, Ratnagiri Maharashtra</h3>
            </div>
        </nav>

        <a href="#"><button>Back to home</button></a>
    </div>
    <div class="cri1">
        <div class="nav">
            <a href="cri1.html">Criteria 1</a>
            <a href="cri2.html">Criteria 2</a>
            <a href="cri3.html">Criteria 3</a>
            <a href="cri4.html">Criteria 4</a>
            <a href="cri5.html">Criteria 5</a>
            <a href="cri6.html">Criteria 6</a>
            <a href="#">Criteria 7</a> 
        </div>
        <hr>
        <section class="down">
            <a href="download_csv_1.2.2_1.2.3.php"><button>Download</button></a> 
        </section>
        <div class="title">
            <p><b>1.2.2 Number of Add on /Certificate programs offered during the year</b></p>
            <p><b>1.2.3 Number of students enrolled in Certificate/ Add-on programs as against the total number of students during the year</b></p>
        </div>
        <div class="table">
            <table style="width:100%">
                <tr>
                    <th>Sr.No</th>
                    <th>Name of Add on /Certificate programs offered*</th>
                    <th>Course Code*</th>
                    <th>Year of Offering*</th>
                    <th>No. of times offered during the same year*</th>
                    <th>Duration of course*</th>
                    <th>Number of Students completing the course in the year*</th>
                    <th>Which year (Year 1)*</th>
                    <th>Edit</th>
                    <th>Add Comment</th>
                </tr>

                <?php include 'fetch_data1.2.2_1.2.3.php'; ?>

            </table>
        </div>
    </div>
</body>
</html>
