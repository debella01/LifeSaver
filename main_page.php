<?PHP
include ('header.php'); 
?>
		<!DOCTYPE html>
		<html>
		<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
			<title>Blood Donation Database</title>
			<link href="menu.css" rel="stylesheet" type="text/css"> 
		<style>
		.mySlides {
			margin-top: 30px;
			margin-bottom: 0px;	
			text-align:center;
		}
		
		::-webkit-scrollbar
		{
			width: 0px;
		}

		
		</style>
		</style>
		</head>
		<body>
		<div id="progressbar"></div>
		<div class="mySlides w3-display-container w3-center">
		<img src="images/main.jpg" style="width: 80%; height: 20%" >
		</div>
      
		<div class="mySlides w3-display-container w3-center">
		<img src="images/hero.png" style=" width: 80%; height: 20%" >
		</div>
      
		<div class="mySlides w3-display-container w3-center">
		<img src="images/stock.png" style="width: 80%; height: 20%" >
		</div>
	  
		<div class="mySlides w3-display-container w3-center">
		<img src="images/before.png" style="width: 80%; height: 20%" >
		</div>
	  
		<div class="mySlides w3-display-container w3-center">
		<img src="images/after.png" style="width: 80%; height: 20%">
		</div>

		<div class="aside">
		<div class="w3-container">
        <h1 align=center>THE LIFESAVER BLOOD DONATION CENTER</h1>
          
		<p align=center>Thank you for your support and trust in LifeSaver Blood Donation Center. You have made the right choice by enrolling into a yearly<br> 
		comprehensive blood donation programme. Millions of people need blood transfusions each year. Some may need blood during surgery.<br> 
		Others depend on it after an accident or because they have a disease that requires blood components. Blood donation makes all of<br> 
		this possible. There is no substitute for human blood — all transfusions use blood from a donor.<br> 
		Every donation is critical and you can make a lifesaving difference.<br>
        <strong>We Can’t Do This Without You</strong></p>
		</div><br><br>
      
		<div class="row">
			<div class="column">
				<h4 align=center><strong> REGISTER TODAY!</strong></h4>
				<a href="insert_donor.html" rel="stylesheet" type="text/css"> 
				<img src="images/d.png" style="width:100px; height:100px;" class="center"></a>
			</div>
           
			<div class="column">
				<h4 align=center><strong> ELIGIBILITY REQUIREMENT </strong></h4>
				<a href="criteria.php" rel="stylesheet" type="text/css">
				<img src="images/e.png" style="width:110px;height:110px;" class="center"></a>
			</div>
           
			<div class="column">
				<h4 align=center><strong> BENEFIT OF BLOOD DONATION </strong></h4>
				<a href="benefit.php" rel="stylesheet" type="text/css">
				<img src="images/f.png" style="width:110px;height:110px;" class="center"></a><br><br><br>
			</div>
		</div>
		</div>   
			
	<script>
    // Automatic Slideshow - change image every 4 seconds
    var myIndex = 0;
    carousel();

    function carousel() {
		var i;
		var x = document.getElementsByClassName("mySlides");
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";  
		}
		myIndex++;
		if (myIndex > x.length) {myIndex = 1}    
		x[myIndex-1].style.display = "block";  
		setTimeout(carousel, 4000);    
    }
	</script>
<?PHP
include ('footer.html'); 
?>
</body>
</html>
