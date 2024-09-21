<?php
session_start();
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'naac_db';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the submission ID from the URL
$id = $_GET['id'];

// Fetch the current data for the form
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM `form1.1.3` WHERE `Sr.no` = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Update the data when the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $year = $_POST['year'];
    $teacher_name = $_POST['tname'];
    $participation_body = $_POST['tpart'];

    $sql = "UPDATE `form1.1.3` 
            SET year = '$year', teacher_name = '$teacher_name', participation_body = '$participation_body'  
            WHERE `Sr.no` = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Updated Successfully!');
                window.location.href = '1.1.3db.php'; 
              </script>";
        exit(); 
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Inter;
}

body {

    align-content: center;
    height: 700px;
}

.nav-bar {
    width: 100%;
    height: 140px;
    background-color: #EDF6FF;
    align-content: center;
    position: absolute;
    top:0px;
    box-shadow:1px 1px 25px -10px black;
}

.logo {
    background-image: url(rmcetlogo.png);
    width: 100px;
    height: 100px;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 50px;
    position: relative;
    /* box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); */
    border-radius: 213.12px;
    /* background-color: #fff; */
    overflow: hidden;
    flex-shrink: 0;
    cursor: pointer;
}

nav {
    display: flex;
    justify-content: center;
} 
.text h4 {
    font-weight: bold;
}

.text {
    align-self: center;
    margin-left: 40px;
    font-family: Inter;
}

    .box {
        padding: 20px 30px 20px;
        background-color: #437FC7;
        width: 180px;
        margin-left: -220px;
        margin-top: 60px;
        text-align: center;
        font-family: Lato;
        font-weight: 700;
        color: #ffff;

    }

    button {

        background-color: #437FC7;
        width: 180px;
        text-align: center;
        font-family: Lato;
        font-weight: 700;
        color: #ffff;
        border: none;
        font-size: 20px;
        height: 45px;
        border-radius: 5px;
        margin-top: 10px;
        margin-bottom: 10px;
        cursor: pointer;
    }

    button:hover {
        background-color: #EDF6FF;
        border: 2px solid #437FC7;
        color: #437FC7;
        transition: 0.5s;
    }

    .title {
        margin-top: 30px;
        text-align:left;
        width: 400px;
    }




    input {
        padding: 10px;
        height: 40px;
        width: 400px;
        background-color: #EDF6FF;
        border-radius: 5px;
        border-bottom: 3px solid #437FC7;
        font-size:15px;
        border-top: none;
        border-left: none;
        border-right: none;
    }



    #wq {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        /* width: 600px; */
        /* margin-left: 350px; */

    }

    .content {
        margin-top: 30px;
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        

    }

    .content div {
        margin-top: 20px;
        
    }

    .content div label{
        font-family: Arial, Helvetica, sans-serif;
    }
    @media only screen and (min-width:360px) and (max-width:1280px){
        #wq{
            margin-left:auto;

        }
        .box{
            margin-left: 1px;
        }
        .title{
            margin-left: 15px;
        }

        input{
            width: 300px;
        }
    }

    
</style>

<body>
<div class="nav-bar">
        <nav>
            <div class="logo">
                <a href="index.html"><img src="rmcetlogo.png" alt="Rmcet logo"></a>
            </div>
            <div class="text">
                <h4>PSPS's</h4>
                <h2>Rajendra Mane College of Engineering & Technology</h2>
                <h3>Ambav, Ratnagiri Maharashtra</h3>
            </div>
        </nav>
</div>
    <form action="" method="POST">
    <div id="wq">
        <div class="box" id="box1">CRITERIA :01</div>
        <div class="title">
            <p style=" font-size: large;font-weight: 600; margin-top: 10px;"> 1.1.3 Teachers of the Institution participate in following activities related to curriculum development and assessment.</p>
        </div>
        <div class="content">
            <div>
            <label for="Date">Year<a style="color: red;">*</a></label>
                    <br>
                    <input type="text" id="year" name="year" value="<?php echo $row['year']; ?>" required>
            </div>
            <div>
                <label for="Name">Name of teacher participated<a style="color: red;">*</a></label>
                <br>
                <input type="text" name="tname"value="<?php echo $row['teacher_name']; ?>" required>
            </div>
            <div>
            <label for="Name">Name of the body in which full time teacher participated<a style="color: red;">*</a></label>
            <br>
            <input type="text" name="tpart" value="<?php echo $row['participation_body']; ?>" required>
            </div>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>
