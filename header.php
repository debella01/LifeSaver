<!DOCTYPE html>
<html lang="en" dir="ltr">
     <head> 
       <meta charset="utf-8">
         <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
		 <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LifeSaver</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="#" rel="stylesheet" type="text/css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<style>
		body {
		  font-family: Montserrat, sans-serif;
		  position: auto; 
		  overflow-x: hidden;
		}
		.logo-image{
			width: 46px;
			height: 46px;
			border-radius: 50%;
			overflow: hidden;
			margin-top: -6px;
		}

		
	</style>
     </head>
     <body>
    <div class="m-4">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
			<div class="logo-image">
				<img src="images/blood-bag.png" class="img-fluid"></div>
            <a href="main_page.php" class="navbar-brand"><strong>LifeSaver</strong></a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Donor</a>
                        <div class="dropdown-menu">
                            <a href="insert_donor.html" class="dropdown-item">Donor Registration</a>
                            <a href="qualification.php" class="dropdown-item">Donor Qualification</a>
                        </div>
                    </li>
					<li class="nav-item">
                        <a href="input_bloodstock.html" class="nav-link">Bloodstock</a>
                    </li>
					<li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Report</a>
                        <div class="dropdown-menu">
                            <a href="view_donor_report.php" class="dropdown-item">Donor</a>
                            <a href="view_bloodstock_report.php" class="dropdown-item">Bloodstock</a>
							<a href="view_bloodstock.php" class="dropdown-item">Bloodstock Quantity</a>
                        </div>
                    </li>
					<li class="nav-item">
                        <a href="search.php" class="nav-link">Search</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ms-auto">
                    <li class="nav-item">
                            <a href="logout.php" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>    
</div>

</body>

</html>