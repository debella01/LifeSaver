<?PHP include ('link_database.php'); 
$ud_Donor_name=$_POST['ud_Donor_name'];
$ud_IC=$_POST['ud_IC'];
$ud_Gender=$_POST['ud_Gender'];
$ud_Blood_type=$_POST['ud_Blood_type'];
$ud_Weight=$_POST['ud_Weight'];
$ud_Height=$_POST['ud_Height'];
$ud_Qualification=$_POST['ud_Qualification'];

$query="UPDATE donor SET Blood_type='$ud_Blood_type', Weight ='$ud_Weight', Height='$ud_Height',  Qualification='$ud_Qualification' WHERE IC='$ud_IC'";
mysqli_query($con,$query);
header("location:qualification.php");
mysqli_close($con);
?>