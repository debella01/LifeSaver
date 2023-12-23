<html>
<head>
<title>LifeSaver Bloodstock</title>
<link href="style.css" rel="stylesheet" type="text/css">

</head>
<body>

<?PHP
	include ('header.php'); 
	//link with the database
	include ('link_database.php');
	
	$num_per_page = 5;
	
	if(isset($_GET["page"]))
	{
		$page=$_GET["page"];
	}
	else
	{
		$page = 1;
	}
	
	$start_from=($page-1)*$num_per_page;
	
	$sql="SELECT * from bloodstock ORDER BY ID ASC limit $start_from, $num_per_page";
	$result = mysqli_query($con,$sql) or die(mysql_error());
 
//create table
?>
<center>
<div class="container">
<P><strong><center><h1> LifeSaver Bloodstock List<h1></strong></center><br />  
<table class="table table-hover" border="0" width="849" align="center" cellspacing="2" cellpadding="2">
  <thead>
<tr>
<td align="center" bgcolor="#96CEB4"><strong>No</strong></td>
<td align="center" bgcolor="#96CEB4"><strong>Donation date</strong></td>
<td align="center" bgcolor="#96CEB4"><strong>Donor IC</strong></td>
<td align="center" bgcolor="#96CEB4"><strong>Blood Group</strong></td> 
<td align="center" bgcolor="#96CEB4"><strong>Quantity Blood Bag</strong></td> 
<td align="center" bgcolor="#96CEB4"><strong>Staff ID</strong></td> 
 
</tr>
 </thead>
<?PHP
	echo "<center>";
	while ($row=mysqli_fetch_array($result))
	{
		 echo "<tr>";
		 echo '<td style="text-align:center">' .$row["ID"].'</td>';
		 echo '<td style="text-align:center">' .$row["Date"].'</td>';
		 echo '<td style="text-align:center">' .$row["IC"].'</td>';
		 echo '<td style="text-align:center">' .$row["Blood_type"].'</td>';
		 echo '<td style="text-align:center">' .$row["Quantity"].'</td>';
		 echo '<td style="text-align:center">' .$row["staffID"].'</td>';
	}
	
echo "</table>";
echo "</center>";
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
	
	$pr_sql=" SELECT * from bloodstock ORDER BY ID ASC"; 
	$pr_result = mysqli_query($con,$pr_sql) or die(mysql_error());
	$total_records = mysqli_num_rows($pr_result);
	$total_pages = ceil($total_records / $num_per_page);
	
	
	if($page>1)
	{
		echo '<a href = "view_input_bloodstock.php?page='.($page-1).'" class = "btn btn-light">&laquo; </a>'; 
	}
	for($i = 1; $i<= $total_pages; $i++) {  
        echo '<a href = "view_input_bloodstock.php?page='.$i.'" class = "btn btn-light ">' . $i . ' </a>';  
    }  
	if($i>$page)
	{
		echo '<a href = "view_input_bloodstock.php?page='.($page+1).'" class = "btn btn-light">&raquo; </a>'; 
	}
	
	include ('footer.html'); 
?>
</div>
</body>
</html>
