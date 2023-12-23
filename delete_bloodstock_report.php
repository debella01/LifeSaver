<?PHP
$ID = $_GET['ID'];
include ('link_database.php'); 
$query = "delete from bloodstock where ID ='$ID'";
$result = mysqli_query($con,$query);

if ($result==TRUE)
{	echo "record successfully Deleted";
    header("location:view_bloodstock_report.php");
 }
if ($result==FALSE) 
{echo "record unsuccessfully Deleted";
  header("location:view_bloodstock_report.php");}
mysqli_close($con);
?>