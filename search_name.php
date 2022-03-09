<?php

    $servername = '127.0.0.1';
    $username = 'remoteuser';
    $password = '4ndr0m3d@';
    $dbname = "Thelp02";
    $connection = mysqli_connect($servername, $username, $password, $dbname);
      
    // Check connection
    if(!$connection){
        die('Database connection error : ' .mysqli_error());
    }
    
?>
<?php 
$query = $_GET['query']; 
	// gets value sent over search form

?>

<!DOCTYPE html>
<html>
<head>
	<title>Search results</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
    <!-- Bootstrap -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="css/hover.css" rel="stylesheet" type="text/css">
	<link href="css/google-translate.css" rel="stylesheet" type="text/css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>	
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<div class="bg-light">
  <a href="https://www.nlrcares.org"><img class="img-fluid d-flex justify-content-center mr-auto ml-auto masthead" src="images/LOGO.png" alt="logo.png"></a></div>
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-aqua">
  <div class="container" style="padding-bottom: 0px;">
    <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon text-white"></span>Menu
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mr-auto">
		<li class="nav-item">
          <a class="nav-link hvr-underline-from-center text-light" href="https://www.nlrcares.org">Home
          <span class="sr-only">(current)</span>
          </a>
		  </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="https://www.nlrcares.org/foodpantries.php">Food Pantries</a>
          <a class="dropdown-item" href="https://www.nlrcares.org/communitycenters.php">Community Centers</a>
          <a class="dropdown-item" href="https://www.nlrcares.org/adulteducation.php">Adult Education</a>
		   <a class="dropdown-item" href="https://www.nlrcares.org/lgbtq+.php">LGBTQ+</a>
			 <a class="dropdown-item" href="https://www.nlrcares.org/healthcare.php">Health Care</a>
			 <a class="dropdown-item" href="https://www.nlrcares.org/datingviolence.php">Dating Violence</a>
			 <a class="dropdown-item" href="https://www.nlrcares.org/substanceabuse.php">Substance Abuse</a>
			 <a class="dropdown-item" href="https://www.nlrcares.org/pregnancyinformation.php">Pregnancy Information</a>
			 <a class="dropdown-item" href="https://www.nlrcares.org/mentalhealth.php">Mental Health</a>
			  <a class="dropdown-item" href="https://www.nlrcares.org/mentor.php">Mentor</a>
			 <a class="dropdown-item" href="https://www.nlrcares.org/transportation.php">Transportation</a>
			<a class="dropdown-item" href="https://www.nlrcares.org/shelters.php">Shelters</a>
        </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Locations
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="https://www.nlrcares.org/nlr">North Little Rock</a>
          <a class="dropdown-item" href="https://www.nlrcares.org/littlerock">Little Rock</a>
          <a class="dropdown-item" href="https://www.nlrcares.org/sherwood">Sherwood</a>
		  <a class="dropdown-item" href="https://www.nlrcares.org/jacksonville">Jacksonville</a>
		  <a class="dropdown-item" href="https://www.nlrcares.org/maumelle">Maumelle</a>		  
        </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light hvr-underline-from-center font-weight-bolder" href="http://lamanlibrary.org">Laman Library</a>
        </li>
		 <li class="nav-item">
          <a class="nav-link text-light hvr-underline-from-center font-weight-bolder" href="http://lamanlibrary.org/teens">Teen Center</a>
        </li>
		<li class="nav-item">
          <a class="nav-link text-light hvr-underline-from-center font-weight-bolder" href="https://www.nlrcares.org/help">Help</a>
        </li>
		      </ul>
    </div>
	 <div class="navbar-brand ">
		<form action="search.php" method="GET" class="search"> <input type="text" name="query" class="search-input" placeholder="Search..."> <a type="submit" value="Search" class="search-icon"> <i class="fa fa-search"></i> </a> </form>
							  </div>
  </div>
</nav>
	<body class="d-flex flex-column min-vh-100 bg-dark" >

        <div class="row container mr-auto ml-auto">
			
            <div class="col-lg-12">
				
                <div class="search-result-box card-box mt-3">
					<div class="float-right mb-4 row"><a href="#" onClick="window.print()"><i class="fa fa-print fa-2x pr-2" aria-hidden="true"></i></a>
						
						</div>
					<br><br>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="pt-3 pb-4">
                                <form action="search.php" method="GET" class="input-group">
                                    <input type="text" name="query" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button type="button" class="btn-dark form-control"><i class="fa fa-search mr-1"></i> Search</button>
                                    </div>
                                </form>
                                <div class="mt-4 text-center">
                                    <h4>Search Results For "<?php echo $query ?>"</h4></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <ul class="nav nav-tabs tabs-bordered">
                        <li class="nav-item"><a href="#home" data-toggle="tab" aria-expanded="true" class="nav-link active">All results <span class="badge badge-success ml-1"><? echo $row_cnt ?></span></a></li>
					
						<li class="btn-group float-right">
					  <button type="button" class="btn dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Sort by
					  </button>
					  <div class="dropdown-menu dropdown-menu-right">
						<button class="dropdown-item" type="button">Name</button>
						<button class="dropdown-item" type="button">City</button>
						<button class="dropdown-item" type="button">Something else here</button>
					  </div>
					</li>
					<li class="btn-group float-right">
					  <button type="button" class="btn dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Translate
					  </button>
					  <div class="dropdown-menu dropdown-menu-right">
						<button class="dropdown-item" type="button">English</button>
						<a href="https://www.lamanlibrary.org.translate.goog/Database/search.php?query=<?php echo $query ?>&_x_tr_sl=auto&_x_tr_tl=es&_x_tr_hl=en-US&_x_tr_pto=nui" class="dropdown-item" type="button">Spanish</a>
						<button class="dropdown-item" type="button">French</button>
					  </div>
					</li>
				
					</ul>
					
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="row">
                                <div class="col-md-12">
<?php
	$query = $_GET['query']; 
	// gets value sent over search form
	
	$min_length = 3;
	// you can set minimum length of the query if you want
	
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to >
		
		$query = mysqli_real_escape_string($connection, $query);
		// makes sure nobody uses SQL injection
		
		$raw_results = mysqli_query($connection,"SELECT * FROM TeenDirectory
			WHERE (`name` LIKE '%".$query."%') OR (`city` LIKE '%".$query."%') OR (`Keyword` LIKE '%".$query."%') ORDER BY name")or die(mysqli_error());
		
		
		if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			
			while($results = mysqli_fetch_array($raw_results)){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
			
				echo '<div class="search-item border-bottom border-dark"><h4 class="mb-1"><a class="text-dark text-decoration-none" href="'.$results['URL'].'">'.$results['Name'].'</a></h4>
                                        <div style="overflow-wrap: break-word;" class="text-success mb-3">'.$results['URL'].'</div>
		 								<ul class="text-dark">
		 								<li>Address:<a href="https://maps.google.com/?q='.$results['Address'].','.$results['City'].','.$results['State'].'"> '.$results['Address'].'</a></li>
										<li>City: '.$results['City'].'</li>
										<li>State: '.$results['State'].'</li>
										<li>Phone: '.$results['Phone'].'</li>
		 									</ul>                                        
                                   		<div class="pb-2 text-dark">'.$results['Description'].'</div>
										            			</div>';
				// posts results gotten from database
			}
			
		}
		else{ // if there is no matching rows do following
			echo '<p class="text-white">No Results!</p>';
		}
		
	}
	else{ // if query length is less than minimum
		echo "Minimum length is ".$min_length;
	}
?>
	 </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
			</div>
		</div>
    <!-- container -->

</body>

</html>