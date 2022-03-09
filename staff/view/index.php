<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: https://www.nlrcares.org/staff/');
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
<div class="container-fluid  mr-auto ml-auto mt-4 mb-4">
<div class="table-responsive rounded" style="height:80vh">
<table class="table bg-table text-white rounded">
  <tr style="position:sticky; top: 0;" class="bg-table rounded">
    <td>ID</td>
    <td>Name</td>
    <td>URL</td>
	<td>City</td>
	<td>Keyword</td>
	<td>Address</td>
	<td>State</td>
	<td>Phone</td>
	<td>Description</td>
	<td>Category</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>

<?php

include "dbConn.php"; // Using database connection file here

$records = mysqli_query($db,"select * from TeenDirectory"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr class="table text-white">
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['Name']; ?></td>
    <td><?php echo $data['URL']; ?></td> 
	<td><?php echo $data['City']; ?></td>
	<td><?php echo $data['Keyword']; ?></td>
	<td><?php echo $data['Address']; ?></td>
	<td><?php echo $data['State']; ?></td>
	<td><?php echo $data['Phone']; ?></td>
	<td><?php echo $data['Description']; ?></td>
	<td><?php echo $data['Category']; ?></td>
    <td><a href="edit.php?id=<?php echo $data['id']; ?>"><i class=" text-white hvr-grow fas fa-edit"></i></a></td>
    <td><a href="delete.php?id=<?php echo $data['id']; ?>"><i class="text-white hvr-grow fas fa-trash-alt"></i></a></td>
  </tr>	
	
	<?php  }?>
	</table>
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
