<!DOCTYPE html>
<html>
<head>
    <title>Apply for Bus Pass </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            color: green;
        }
        .student-info {
            max-width: 400px;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Application for Bus Pass</h1>
    <form method="POST">
        <label for="student_id">Student ID:</label>
        <input type="number" name="student_id" id="student_id" required/><br>

        <label for="student_name">Student Name:</label>
        <input type="text" name="student_name" id="student_name" required/><br>

        <label for="student_age">Student Age:</label>
        <input type="number" name="student_age" id="student_age" required/><br>

        <label for="student_gender">Student Gender:</label>
        <input type="text" name="student_gender" id="student_gender" required/><br>

        <label for="boarding_location">Boarding Location:</label>
        <input type="text" name="boarding_location" id="boarding_location" required/><br>

        <label for="pass_expiry_month">Pass Expiry Month:</label>
        <select id="pass_expiry_month" name="pass_expiry_month">
	<option value="upto october">upto october</option>
	<option value="upto november">upto november</option>
	<option value="upto december">upto december</option>
	<option value="upto january">upto january</option>
	<option value="upto february">upto february</option>
        <option value="upto march">upto march</option>
	<option value="upto april">upto april</option>
	<option value="upto may ">upto may</option>
	</select>
	
        <input type="submit" name="generate_pass" value="Generate Bus Pass"/>
    </form>

<?php
$ServerName = "localhost";
$UserName = "root";
$Password = "";
$Dbname = "buspass";

$conn = mysqli_connect($ServerName, $UserName, $Password, $Dbname);

if (mysqli_connect_errno()) {
    echo "Failed to connect to the database: " . mysqli_connect_error();
    exit(); 
}

if (isset($_POST['generate_pass'])) {
    
    $StudentID = $_POST['student_id'];
    $StudentName = $_POST['student_name'];
    $StudentAge = $_POST['student_age'];
    $StudentGender = $_POST['student_gender'];
    $BoardingLocation = $_POST['boarding_location'];
    $PassExpiryMonth = $_POST['pass_expiry_month'];

    
    $query = "INSERT INTO Students (DeptNo, Name, Age, Gender, BoardingLocation, PassExpiryMonth)
              VALUES ('$StudentID', '$StudentName', '$StudentAge', '$StudentGender', '$BoardingLocation', '$PassExpiryMonth')";

   
    if ($conn->query($query) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $conn->error;
        exit(); // Terminate the script
    }

    $conn->close();

    
    echo "<div class='message'>Bus Pass Generated Successfully and Student Information Updated</div>";

    
    echo "<div class='student-info'>";
    echo "<h2>Student Information:</h2>";
    echo "<p><strong>Student ID:</strong> $StudentID</p>";
    echo "<p><strong>Student Name:</strong> $StudentName</p>";
    echo "<p><strong>Student Age:</strong> $StudentAge</p>";
    echo "<p><strong>Student Gender:</strong> $StudentGender</p>";
    echo "<p><strong>Boarding Location:</strong> $BoardingLocation</p>";
    echo "<p><strong>Pass Expiry Month:</strong> $PassExpiryMonth</p>";
    echo "</div>";
}
?>

</body>
</html>
