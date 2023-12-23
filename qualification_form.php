<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Donor Qualification Form</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css">

</head>

<body>
<script>
    function cal()
    {
		
        var ud_Height, ud_Weight, BMI;
        ud_Height = parseFloat(document.form1.ud_Height.value);
		ud_Weight = parseFloat(document.form1.ud_Weight.value);
	    BMI = ud_Weight / (ud_Height*ud_Height);
        
		var msg="";
		if (BMI < 18.5)
		{
			msg = "Under weight";
			ud_Qualification = "NO";
		}
		else if (BMI > 18.5 && BMI < 24.9)
		{
			msg = "Normal weight";
			ud_Qualification = "YES";
		}
		else if (BMI > 25 && BMI < 29.9)
		{
			msg = "Overweight";
			ud_Qualification = "YES";
		}
		else
		{
			msg = "Obesity";
			ud_Qualification = "YES";
		}
		document.form1.BMI.value = BMI.toFixed(2);		
		document.form1.msg.value = msg;
        document.form1.ud_Qualification.value = ud_Qualification;
    }
</script>

<?PHP
include ('link_database.php'); 
$IC=$_GET['IC'];
$query="SELECT * FROM donor WHERE IC='$IC'";
$result=mysqli_query($con,$query);
$num= mysqli_num_rows($result);

$i=0;
while ($i < $num) {
$show=mysqli_fetch_assoc($result);
$Donor_name=$show['Donor_name'];
$IC=$show['IC'];
$Gender=$show['Gender'];
$Weight=$show['Weight'];
$Height=$show['Height'];
$Qualification=$show['Qualification'];
$Blood_type=$show['Blood_type'];


?>

<div class="w3-container w3-teal">
  <strong><center><h1>DONOR QUALIFICATION FORM</h1></center></strong>
</div>

<div class="container">
<form action="qualification_process.php" method="post" enctype="multipart/form-data" name="form1">
  <div class="form-group">
    <label for="Donor_name">Name</label>
    <input type="text" class="form-control" name="ud_Donor_name" id="ud_Donor_name" readonly="readonly" value="<?php echo $Donor_name; ?>" />
  </div>
  <div class="form-group">
    <label for="IC">IC No.</label>
    <input type="text" class="form-control" name="ud_IC" id="ud_IC" readonly="readonly" value="<?php echo $IC; ?>" />
  </div>
  
  <div class="form-group">
    <label for="Gender">Gender</label>
    <input type="text" class="form-control" name="ud_Gender" id="ud_Gender" readonly="readonly" value="<?php echo $Gender; ?>" />
  </div>
 
<div class="form-group"><br>
    <label for="Blood_type">Blood Group</label><br>
    <input type="radio" id="A" name="ud_Blood_typee" value="A">
    <label for="A">A</label>
    <input type="radio" id="B" name="ud_Blood_type" value="B">
    <label for="B">B</label>
    <input type="radio" id="AB" name="ud_Blood_type" value="AB">
	<label for="AB">AB</label>
    <input type="radio" id="O" name="ud_Blood_type" value="O">
    <label for="O">O</label><br>
  </div>
 
  <div class="form-group">
    <label for="Weight">Weight (kg)</label>
    <input type="number" class="form-control" name="ud_Weight" id="ud_Weight" value="<?php echo $Weight; ?>" />
  </div>
  
   <div class="form-group">
    <label for="Height">Height (m)</label>
    <input type="float" class="form-control" name="ud_Height" id="ud_Height" value="<?php echo $Height; ?>" />
  </div>

<button type="button" onclick="cal()" class="btn btn-success">CALCULATE BMI</button></br><br> 

  <div class="form-group">
    <label for="BMI">BMI(kg/m²)</label>
    <input type="text" class="form-control" name="BMI" id="BMI" >
  </div>

<div class="form-group">
    <label for="BMI_status">BMI status</label>
    <input type="text" class="form-control" name="msg" id="msg" >
  </div>

<div class="form-group">
    <label for="Qualification">Eligible to donate blood</label>
    <input type="text" class="form-control" name="ud_Qualification" id="ud_Qualification" value="<?php echo $Qualification; ?>" />
  </div>

  <button  name="SUBMIT" type="SUBMIT" class="btn btn-info">SUBMIT</button></br>
</form>

<?PHP
++$i;
}
?>
</body>
</html>