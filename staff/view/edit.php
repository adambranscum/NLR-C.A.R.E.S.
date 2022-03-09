<?php

include "dbConn.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($db,"select * from TeenDirectory where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $Name = $_POST['Name'];
    $URL = $_POST['URL'];
	$City = $_POST['City'];
	$Keyword = $_POST['Keyword'];
    $Address = $_POST['Address'];
	$State = $_POST['State'];
	$Phone = $_POST['Phone'];
    $Description = $_POST['Description'];
	$Category = $_POST['Category'];
	
    $edit = mysqli_query($db,"update TeenDirectory set Name='$Name', URL='$URL', City='$City', Keyword='$Keyword', Address='$Address', State='$State', Phone='$Phone', Description='$Description', Category='$Category' where id='$id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("Location: https://www.nlrcares.org/staff/view"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>
<!DOCTYPE html>
<html lang="en"> <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TTRD: Modify</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
    <!-- Bootstrap -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="css/stylesheet.css" rel="stylesheet" type="text/css">
	<link href="css/hover.css" rel="stylesheet" type="text/css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>	
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/55172d6e85.js" crossorigin="anonymous"></script>
	  
  </head>
    <!-- Navigation -->
<div class="">
  <a href="https://www.nlrcares.org"><img class="img-fluid d-flex justify-content-center mr-auto ml-auto masthead" src="images/logo.png" alt="logo.png"></a></div>
<nav class="navbar navbar-expand-lg navbar-light navbar-light bg-search-nav dropshadow-bottom">
  <div class="container-fluid" style="padding-bottom: 0px;">
    <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon text-white"></span>Menu
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mr-auto">
		<li class="nav-item">
          <a class="nav-link hvr-underline-from-center text-light" href="https://www.nlrcares.org/staff/h0m3.php">Dashboard
          <span class="sr-only">(current)</span>
          </a>
		  </li>
        <li class="nav-item">
          <a class="nav-link text-light hvr-underline-from-center font-weight-bolder" href="https://www.nlrcares.org/staff/view">View</a>
        </li>
		 <li class="nav-item">
          <a class="nav-link text-light hvr-underline-from-center font-weight-bolder" href="https://www.nlrcares.org/staff/new">New Entry</a>
        </li>
		<li class="nav-item">
          <a class="nav-link text-light hvr-underline-from-center font-weight-bolder" href="https://www.nlrcares.org">TRD Front-End</a>
        </li>
		 <li class="nav-item">
          <a class="nav-link text-light hvr-underline-from-center font-weight-bolder" href="https://www.nlrcares.org/staff/survey">Survey</a>
        </li> 
		      </ul>
    </div>
	 <div class="navbar-brand text-white">
		<form method='post' action="">
			<input class="btn btn-danger text-white" type="submit" value="Logout" name="but_logout">
        </form>
							  </div>
  </div>
</nav>

<body class="d-flex flex-column vh-100 bg-search">
<div class="container text-light mt-4 mb-5">
<div>
<form class="col-lg-12 rounded bg-table dropshadow"  method="POST">
   <h1 class="mb-4">Update Data</h1>
  <div class="form-group">
  <label>Name:</label>
  <input class="form-control" type="text" name="Name" value="<?php echo $data['Name'] ?>" placeholder="Enter Name" Required>
	</div>
  <div class="form-group">
  <label>URL:</label>
  <input class="form-control" type="text" name="URL" value="<?php echo $data['URL'] ?>" placeholder="Enter URL" Required>
	</div>
  <div class="form-group">
  <label>City:</label>
  <input  class="form-control" type="text" name="City" value="<?php echo $data['City'] ?>" placeholder="Enter City" Required>
	</div>
  <div class="form-group">
  <label>Keywords:</label>
  <input class="form-control" type="text" name="Keyword" value="<?php echo $data['Keyword'] ?>" placeholder="Keyword" Required>
	</div>
  <div class="form-group">
  <label>Address:</label>
  <input class="form-control" type="text" name="Address" value="<?php echo $data['Address'] ?>" placeholder="Address" Required>
	</div>
  <div class="form-group">
  <label>State:</label>
  <input class="form-control" type="text" name="State" value="<?php echo $data['State'] ?>" placeholder="Enter State" Required>
	</div>
  <div class="form-group">
  <label>Phone:</label>
  <input class="form-control" type="text" name="Phone" value="<?php echo $data['Phone'] ?>" placeholder="Enter Phone" Required>
	</div>
  <div class="form-group">
  <label>Description:</label>
  <input rows="5" col="50" class="form-control" type="text" name="Description" value="<?php echo $data['Description'] ?>" placeholder="Enter Description" Required>
	</div>
  <div class="form-group">
                            <label>Category</label><br>
                            <select class="form-control" name="Category" value="<?php echo $data['Category'] ?>">
							<option value="Food Pantries">Food Pantries</option>
							<option value="Adult Education">Adult Education</option>
							<option value="Community Centers">Community Centers</option>
							<option value="Health Care">Health Care</option>
							<option value="Dating Violence">Dating Violence</option>
							<option value="Pregnancy Information">Pregnancy Information</option>
							<option value="Mental Health">Mental Health</option>
							<option value="Recreation Centers">Recreation Centers</option>
							<option value="Substance Abuse">Substance Abuse</option>
							<option value="LGBTQ+">LGBTQ+</option>
							<option value="Transportation">Transportation</option>
							<option value="Mentor">Mentor</option>
						  </select>
                        </div>
  <input class="mt-2 btn btn-success mb-4" type="submit" name="update" value="Update">
</form>
	</div>
	</div>
	</body>
<footer class="mt-auto">
	    <div class="bg-footer mt-5 dropshadow-two">
      <h2 class="text-center text-white pt-2">North Little Rock C.A.R.E.S.</h2>
      
    
      <div class="col-md-12">
        <p class="text-center pt-2 mb-0 pb-4 text-white">www.nlrcares.org  2021. All Rights Reserved</p>
      </div>
   
	</div>
	
	
</footer>
</html>