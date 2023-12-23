<html>
<head>
 <title> LifeSaver Bloodstock Report</title>
 <link href="style.css" rel="stylesheet" type="text/css">

 </head>
<body>

<?php
include ('header.php'); 
?>

<?php
$searchterm=$_POST['searchterm'];
$searchterm= trim($searchterm);

if (!$searchterm)
{
	echo '<p><center> Please INSERT your search. Try Again.</center></p>';
	exit;
}

include ('link_database.php');
$query = "select * from v_bloodstock_report where ID like '%".$searchterm."%'";
$result = mysqli_query($con,$query);
$num_results = mysqli_num_rows($result);
echo "<center>";

?>
<div class="container">
<P><strong><center><h1> LifeSaver Bloodstock Report</h1></strong></center><br />  
<table class="table table-hover" border="0" width="849" align="center" cellspacing="2" cellpadding="2">
  <thead>
<tr>
<td align="center" bgcolor="#FFCC00"><strong>No</strong></td>
<td align="center" bgcolor="#FFCC00"><strong>Date</strong></td>
<td align="center" bgcolor="#FFCC00"><strong>IC No.</strong></td>
<td align="center" bgcolor="#FFCC00"><strong>Name</strong></td> 
<td align="center" bgcolor="#FFCC00"><strong>Blood Group</strong></td> 
<td align="center" bgcolor="#FFCC00"><strong>Quantity</strong></td>
<td align="center" bgcolor="#FFCC00"><strong>Staff ID</strong></td>
<td align="center" bgcolor="#FFCC00"><strong>Delete</strong></td>
</tr>
</thead>
<?PHP

while ($row=mysqli_fetch_assoc($result))
{
 echo "<tr>";
 $ID=$row["ID"];
 echo '<td style="text-align:center">' .$row["ID"]. '</td>';
 echo '<td style="text-align:center">' .$row["Date"].  '</td>';
 echo '<td style="text-align:center">' .$row["IC"].'</td>';
 echo '<td style="text-align:center">' .$row["Donor_name"].'</td>';
 echo '<td style="text-align:center">' .$row["Blood_type"].'</td>';
 echo '<td style="text-align:center">' .$row["Quantity"].'</td>';
 echo '<td style="text-align:center">' .$row["staffID"].'</td>';
 echo "<td>","<a  href=\"delete_bloodstock_report.php?ID=$ID\"><center>Delete</center></a>";
}
echo "</table>";
echo "</center>";
echo "<br>";
echo "</div>";


include ('footer.html'); 
 ?>
 
 

 
</body>
</html>
