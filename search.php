<html>
	<head>
	<title>LifeSaver Search</title>
	<link href="style.css" rel="stylesheet" type="text/css">

	</head>	
	
	<body>
	<?php
	include ('header.php'); 
	?>
	
		<h1 align="center"> LifeSaver Searching Data </h1></br>
		
		<form action= "search_process.php" method="post">
		<div align="center"><span class="style1">Search for</span>:<br/>
		<Select NAME="searchtype">
			<Option VALUE = "Blood_type">Blood Group</option>
			<Option VALUE = "State">State</option>
			<Option VALUE = "Postcode">Postcode</option>
			<Option VALUE = "Address">Address</option>
			
		</Select><br/><br />
		
		Enter Search Term:<br/>
		<input Name="searchterm" type="text"><br /><br />
		<button  name="SUBMIT" type="SUBMIT" class="btn btn-success">Search</button>

		</div>
		</form>
	<?php
		include ('footer.html'); 
	?>
	</body>
</html>