<?PHP
$IC = $_GET['IC'];
include ('link_database.php'); 
$query = "delete from donor where IC ='$IC'";
$result = mysqli_query($con,$query);

if ($result==TRUE)
{	echo "record successfully Deleted";
    header("location:qualification.php");
 }
if ($result==FALSE) 
{echo "record unsuccessfully Deleted";
  header("location:qualification.php");}
mysqli_close($con);
?>