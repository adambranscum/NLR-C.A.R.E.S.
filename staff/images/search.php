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

<!DOCTYPE html>
<html>
<head>
	<title>Search results</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>William F. Laman Public Library</title>
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
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>	
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100" >
<a href="index.html"><img class="img-fluid d-flex justify-content-center mr-auto ml-auto masthead" src="images/LOGO.png" alt="logo.png"></a>
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-aqua">
  <div class="container" style="padding-bottom: 0px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mr-auto">
		<li class="nav-item">
          <a class="nav-link hvr-underline-from-center text-light" href="index.html">Home
          <span class="sr-only">(current)</span>
          </a>
		  </li>
        <li class="nav-item">
          <a class="nav-link hvr-underline-from-center text-light" href="http://lamanlibrary.org/digital">Digital Library
          <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light hvr-underline-from-center font-weight-bold" href="http://lamanlibrary.evanced.info/signup"> Calendar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light hvr-underline-from-center font-weight-bolder" href="http://lamanlibrary.org/youth">Kids</a>
        </li>
		 <li class="nav-item">
          <a class="nav-link text-light hvr-underline-from-center font-weight-bolder" href="http://lamanlibrary.org/teens">Teens</a>
        </li>
		<li class="nav-item">
          <a class="nav-link text-light hvr-underline-from-center font-weight-bolder" href="http://lamanlibrary.org/about">About Us</a>
        </li>
		      </ul>
    </div>
	  <div class="navbar-brand">
		<form id="lookingforbook" class="form-inline ml-auto" action="https://wflpl.tlcdelivers.com">
      <div class="md-form my-0">
        <input class="form-control border-light" type="text" name="term" id="searchfor" value="" rel-"Search Term" placeholder="Search Catalog..." aria-label="Search">
		 <input type="hidden" name="section" value="search">
		 <input type="hidden" name="config" value="pac"> 
      </div>
      <button action="https://wflpl.tlcdelivers.com" class="btn btn-light btn-md my-0 ml-sm-2 hvr-grow-shadow" type="submit">Search</button>
    </form>
							  </div>
  </div>
</nav>
<h1 class=" mt-5 container bg-aqua text-white align-content-center">Search Results</h1>
<div class="container mb-5 bg-aqua pb-5">
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
			WHERE (`name` LIKE '%".$query."%') OR (`city` LIKE '%".$query."%') OR (`Keyword` LIKE '%".$query."%')")or die(mysqli_error());
		
		
		if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			
			while($results = mysqli_fetch_array($raw_results)){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
			
				echo '<h3><a class="text-white text-decoration-none hvr-grow" href="'.$results['URL'].'">'.$results['Name'].'</a></h3><br><p class="text-white">'.$results['Name'].'</p><br>';
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
</body>
<footer class="mt-auto" role="contentinfo">
  <div class="footer-middle bg-aqua text-light">
  <div class="container text-center bg-aqua text-light">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>About</h4>
          <ul class="list-unstyled">
            <li><a href="#"></a></li>
            <li><a href="http://www.lamanlibrary.org/about">About Us</a></li>
            <li><a href="mtb.html">Meet the Board</a></li>
            <!--<li><a href="mtd.html">Meet the Director</a></li>-->
            <li><a href="policies.html">Policies</a></li>
            <li><a href="http://www.lamanlibrary.org/jobs">Careers</a></li>
			<li><a href="https://www.lamanlibrary.org/staff">Staff</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>News</h4>
          <ul class="list-unstyled">
            <li><a href="news.html">e-Newsletter</a></li>
            <li><a href="blog.html">Laman Blog</a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>City Services</h4>
          <ul class="list-unstyled">            
            <li><a href="http://nlr.ar.gov/">City of North Little Rock</a></li>
            <li><a href="http://nlr.ar.gov/government/a_z_department_list/fire_department">Fire Department</a></li>
            <li><a href="https://nlrpolice.org/">Police Department</a></li>
			<li><a href="http://nlrpr.org/">Parks and Recreation</a></li>
            <li><a href="#"></a></li>
            <li>
              <a href="#"></a>
            </li>
          </ul>
        </div>
      </div>
    	<div class="col-md-3">
    		<h4>Follow Us</h4>
            <ul class="social-network social-circle">
             <li><a href="https://www.facebook.com/lamanlibrary/" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
             <li><a href="https://twitter.com/lamanlibrary?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="icoLinkedin" title="Twitter"><i class="fa fa-twitter"></i></a></li>
			 <li><a href="https://www.youtube.com/user/Lamanlibrary" class="icoLinkedin" title="YouTube"><i class="fa fa-youtube"></i></a></li>
			 <li><a href="https://www.instagram.com/lamanpubliclibrary/" class="icoLinkedin" title="Instagram"><i class="fa fa-instagram"></i></a></li>
            </ul>				
		</div>
    </div>
	<div class="row">
		<div class="col-md-12 copy">
			<p class="text-center">&copy; Copyright 2020 - Laman Library.  All rights reserved.</p>
		</div>
	</div>


  </div>
  </div>
</footer>
</html>