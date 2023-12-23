<!DOCTYPE html>
<html>
<head>
<title>LifeSaver Bloodstock</title>
</head>
<body>
<?php 
include ('link_database.php'); 

$Date = $_POST['Date'];
$IC = $_POST['IC'];
$Blood_type = $_POST['Blood_type'];
$Quantity = $_POST['Quantity'];
$staffID = $_POST['staffID'];
$query ="insert into bloodstock (Date, IC, Blood_type, Quantity, staffID)
values('$Date','$IC', '$Blood_type', '$Quantity', '$staffID')";
if (mysqli_query($con, $query)) {
	   
	header("location: view_input_bloodstock.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}
mysqli_close($con);
?> 
</body>
</html>
