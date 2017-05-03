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
		<title>Registration || Sudoku</title>
		<meta charset="UTF-8">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="style.css">
	    <style type="text/css">
		  header {
			  height:100px;
			  background:black;
			  color: white;
			  text-align:center;
			  line-height:100px;
			}
			footer { 
			  position: relative;
			  margin-top: 150px; /* negative value of footer height */
			  height: 75px;
			  text-align:center;
			  background:black;
			  color: white;
			}
			.cta
			{
			  font-family: 'helvetica neue', helvetica, arial, sans-serif;
			  font-weight:500;
			  text-decoration:none;
			  margin: 0px 0px;
			  color:white;
			  background: black;
			  display:inline-block;
			  text-shadow:0 -1px 0px rgba(0,0,0,0.3);
			  padding:8px 1em;
			  border-radius:4px;
			  box-shadow: 0 1px 0 rgba(255,255,255,0.5) inset, 0 -1px 0 rgba(0,0,0,0.3) inset;
			}

			.cta-colouring(@main-color)
			{
			   border:1px solid darken(@main-color, 5%);
			   background:@main-color;
			}
		</style>
	</head>
	<body>
		<header>
			<h2>WELCOME TO SUDOKU RACE</h2>
			<h4>Created by Bees, Njay, Sid</h4>
		</header>
		<br/><br/><br/><br/><br/><br/><br/><br/>
		<div class="container">
			<form class="form-horizontal">

				<div class="form-group">
			    	<label class="control-label col-sm-4" for="fname">Avatar Name:</label>
			    	<div class="col-xs-4">
			      		<input type="text" class="form-control" id="name" placeholder="Enter first name" required>
			    	</div>
			  	</div>
			  	<div class="form-group"> 
			    	<div class="col-sm-offset-5 col-sm-8">
			      		<button type="button" class="btn btn-primary" id ="register">Start Playing</button>
			    	</div>
			  	</div>
			</form>
		</div>
		<script src="reg.js"></script>
		<footer>
		    Hello. You can drop a mail here : bns@gmail.com
		  </footer>
	</body>
</html>