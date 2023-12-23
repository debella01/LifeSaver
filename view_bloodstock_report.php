<html>
<head>
<title>LifeSaver Bloodstock Report</title>
<link href="style.css" rel="stylesheet" type="text/css">

</head>
<body>
<?PHP
include ('header.php'); 
include ('link_database.php');

	$num_per_page = 10;
	
	if(isset($_GET["page"]))
	{
		$page=$_GET["page"];
	}
	else
	{
		$page = 1;
	}
	
	$start_from=($page-1)*$num_per_page;
	
	$sql=" SELECT * from v_bloodstock_report limit $start_from, $num_per_page"; 
	$result = mysqli_query($con,$sql) or die(mysql_error());
?>
<div class="container">
<P><strong><center><h1> LifeSaver Bloodstock Report</h1></strong></center></br>  
	
	<form action= "view_bloodstock_report_search.php" method="post">
	<div align="right"><span class="style1">Search ID: </span>
	<input Name="searchterm" type="text">
	<button  name="SUBMIT" type="SUBMIT" class="btn btn-success">Search</button></br></br>

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
echo "<center>";
echo "<br>";
echo "</div>";

?>
<style>
.pagination{
	display: inline-block;
}

.pagination a{
	color: black;
	float:left;
	padding: 8px 16px;
	text-decoration: none;
	transition: background-color .3s;
}

.pagination a.active{
	background-color: #4CAF50;
	color: white;
}

.pagination a:hover:not(.active)
{
	background-color: #ddd;
}

</style>

<div align="center">

<?php
	
	$pr_sql=" SELECT * from v_bloodstock_report"; 
	$pr_result = mysqli_query($con,$pr_sql) or die(mysql_error());
	$total_records = mysqli_num_rows($pr_result);
	$total_pages = ceil($total_records / $num_per_page);
	
	
	if($page>1)
	{
		echo '<a href = "view_bloodstock_report.php?page='.($page-1).'" class = "btn btn-light">&laquo; </a>'; 
	}
	for($i = 1; $i<= $total_pages; $i++) {  
        echo '<a href = "view_bloodstock_report.php?page='.$i.'" class = "btn btn-light ">' . $i . ' </a>';  
    }  
	if($i>$page)
	{
		echo '<a href = "view_bloodstock_report.php?page='.($page+1).'" class = "btn btn-light">&raquo; </a>'; 
	}
	
	include ('footer.html'); 
?>
</div>

</body>
</html>
