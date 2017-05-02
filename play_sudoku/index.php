<?php 
	include("includes/database_connection.php");
	include("includes/functions.php");
	include("includes/session.php");
?>
<?php
	//echo $_SESSION['logged_in'];
	if($_SESSION['logged_in'])
		redirect_to("sudoku.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registration || Loan Kernel</title>
		<meta charset="UTF-8">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="style.css">
	</head>
	<body>
		<header><a href="#">Welcome to ABC.com</a></header>
		<h2 id="sub-heading">Please enter the details to register</h2>
		<br/>
		<div class="container">
			<form class="form-horizontal">
				<div class="form-group">
			    	<label class="control-label col-sm-4" for="fname">Enter Name:</label>
			    	<div class="col-xs-4">
			      		<input type="text" class="form-control" id="name" placeholder="Enter first name" required>
			    	</div>
			  	</div>
			  	<div class="form-group"> 
			    	<div class="col-sm-offset-4 col-sm-8">
			      		<button type="button" class="btn btn-success" id ="register">LOGIN</button>
			    	</div>
			  	</div>
			</form>
		</div>
		<script src="reg.js"></script>
	</body>
</html>