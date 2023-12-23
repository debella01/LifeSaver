<!DOCTYPE html>
<html>
<head>
<title>LifeSaver Donor Registration</title>
</head>
<body>
<?php 
//file nih tak perlu bukak di web localhost
include ('link_database.php'); 
$IC = $_POST['IC'];
$Donor_name = $_POST['Donor_name'];
$Gender = $_POST['Gender'];
$Phone_num = $_POST['Phone_num'];
$Postcode = $_POST['Postcode'];

$query ="insert into donor(Donor_name, IC, Gender, Phone_num, Postcode ) values ('$Donor_name','$IC', '$Gender','$Phone_num','$Postcode')";
if (mysqli_query($con, $query)) {
	
  echo "Donor_name :".$Donor_name."<br>";
  echo "IC :".$IC."<br>";
  echo "Phone :".$Phone."<br>";
  echo "Gender :".$Gender."<br>";
  echo "Phone_num :".$Phone_num."<br>";
  echo "Postcode :".$Postcode."<br>";
  
    echo "New record created successfully";
	
	header("location: view_insert_donor.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}
mysqli_close($con);
?> 
</body>
</html>
