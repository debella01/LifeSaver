<html>
<head>
 <title> Search Result </title>
 <link href="style.css" rel="stylesheet" type="text/css">

 </head>
<body>

<?php
include ('header.php'); 
?>

<?php
$searchtype=$_POST['searchtype'];
$searchterm=$_POST['searchterm'];
$searchterm= trim($searchterm);

if (!$searchtype || !$searchterm)
{
	echo '<p><center> Please INSERT your search. Try Again.</center></p>';
	exit;
}

include ('link_database.php');
$query = "select * from v_donor_report where ".$searchtype." like '%".$searchterm."%'";
$result = mysqli_query($con,$query);
$num_results = mysqli_num_rows($result);
echo "<center>";


?>
<div class="container">
<P><strong><center><h1> LifeSaver Donor List</h1></strong></center><br />  
<table class="table table-hover" border="0" width="849" align="center" cellspacing="2" cellpadding="2">
  <thead>
<tr>
<td align="center" bgcolor="#FFCC00"><strong>IC No.</strong></td>
<td align="center" bgcolor="#FFCC00"><strong>Name</strong></td>
<td align="center" bgcolor="#FFCC00"><strong>Gender</strong></td>
<td align="center" bgcolor="#FFCC00"><strong>Phone No.</strong></td>
<td align="center" bgcolor="#FFCC00"><strong>Postcode</strong></td>
<td align="center" bgcolor="#FFCC00"><strong>Blood Group</strong></td>

</tr>
</thead>
<?PHP

for ($i=0; $i <$num_results; $i++)
{
 $row = mysqli_fetch_array($result);
 echo "<tr>";
 echo '<td style="text-align:center">' .$row["IC"]. '</td>';
 echo '<td style="text-align:center">' .$row["Donor_name"].  '</td>';
 echo '<td style="text-align:center">' .$row["Gender"].'</td>';
 echo '<td style="text-align:center">' .$row["Phone_num"].'</td>';
 echo '<td style="text-align:center">' .$row["Postcode"].'</td>';
 echo '<td style="text-align:center">' .$row["Blood_type"].'</td>';
}
echo "</table>";
echo "</center>";
echo "<br>";
echo "</div>";
echo '<p style="text-align:center">   Result found : '.$num_results.'</p>';

include ('footer.html'); 
 ?>
 
 

 
</body>
</html>
