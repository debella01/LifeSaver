<html>
<head>
<title>LifeSaver Bloodstock Report</title>
<link href="style.css" rel="stylesheet" type="text/css">

</head>
<body>
<?PHP
include ('header.php'); 
include ('link_database.php');
	
	$sql=" SELECT * from v_bloodstock"; 
	$result = mysqli_query($con,$sql) or die(mysql_error());
?>
<div class="container">
<P><strong><center><h1> LifeSaver Bloodstock Quantity Report</h1></strong></center></br>  
<table class="table table-hover" border="0" width="849" align="center" cellspacing="2" cellpadding="2">
  <thead>
<tr>
<td align="center" bgcolor="#FFCC00"><strong>Blood Group</strong></td>
<td align="center" bgcolor="#FFCC00"><strong>Quantity</strong></td>
</tr>
 </thead>

<?PHP
while ($row=mysqli_fetch_assoc($result))
{
 echo "<tr>";
 echo '<td style="text-align:center">' .$row["Blood_type"]. '</td>';
 echo '<td style="text-align:center">' .$row["SUM(Quantity)"].  '</td>';
}
echo "</table>";
echo "<center>";
echo "<br>";
echo "</div>";

	include ('footer.html'); 
?>
</div>

</body>
</html>
