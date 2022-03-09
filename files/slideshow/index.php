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
<nav class="navbar navbar-expand-lg navbar-light bg-aqua">
  <div class="container-fluid" style="padding-bottom: 0px;">
    <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon text-white"></span>Menu
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mr-auto">
		<li class="nav-item">
          <a class="nav-link hvr-underline-from-center text-light" href="https://www.lamanlibrary.org/trd_staff">Dashboard
          <span class="sr-only">(current)</span>
          </a>
		  </li>
        <li class="nav-item">
          <a class="nav-link text-light hvr-underline-from-center font-weight-bolder" href="https://www.lamanlibrary.org/trd_staff/view">View</a>
        </li>
		 <li class="nav-item">
          <a class="nav-link text-light hvr-underline-from-center font-weight-bolder" href="https://www.lamanlibrary.org/trd_staff/new">New Entry</a>
        </li>
		<li class="nav-item">
          <a class="nav-link text-light hvr-underline-from-center font-weight-bolder" href="https://www.nlrcares.org">TRD Front-End</a>
        </li>
		      </ul>
    </div>
	 <div class="navbar-brand text-white">
		TRD: Staff Dashboard
							  </div>
  </div>
</nav>

<body class="d-flex flex-column vh-100 bg-dark">
<div class="row">
<div class="col-4">
	<form class="form-group" method="post" action="upload.php" enctype="multipart/form-data" id="emailForm">
                               <div class="form-group">
								<label class="text-light">Position:</label>
                                <select class="form-control" name="placement">
							   <option value="1">1</option>
							   <option value="2">2</option>
							   <option value="3">3</option>
							   <option value="4">4</option>
							   <option value="5">5</option>
							   <option value="6">6</option>
							   <option value="7">7</option>
							   <option value="8">8</option>
								</select>
                           		 </div>
                            <div class="form-group text-white">
                                <input class="bg-aqua form-control upload-file text-white"  type="file" id="files" name="uploaded_file"><br>
        						<input class="btn btn-success mt-4 float-right dropshadow" type="submit" value="Upload file">
                                <div id="attachmentError" style="color: red;font-size: 14px;display: none">attachmentError</div>
                            </div>
                        </form>

	
	</div>
	<div class="col-6">
<div class="table-responsive">
<table class="table table-dark text-white">
  <tr style="position:sticky; top: 0;" class="bg-dark">
    <td>ID</td>
    <td>Name</td>
	  <td>URL</td>
  </tr>

<?php

$db = mysqli_connect('127.0.0.1', 'remoteuser', '4ndr0m3d@', 'WFL-Signage');

$records = mysqli_query($db,"select * from circ01"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr class="table text-white">
    <td></td>
	 
    <td><img src="<?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $data['data'] ) . '" />';?>"/></td>
    <td><?php echo $data['date']; ?></td> 
  </tr>	
	
	<?php  }?>
	</table>
  </div>
	</div>
	</div>
	</body>
	<footer class="fixed-bottom" role="contentinfo">

	<div class="row bg-aqua">
		<div class="col-md-12 copy">
			<p class="text-center">&copy; Copyright 2020 - Laman Library.  All rights reserved.</p>
		</div>
	</div>


  </div>
  </div>
</footer>
	</html>
