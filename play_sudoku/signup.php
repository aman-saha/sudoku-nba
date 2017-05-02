<?php 
	include("../includes/database_connection.php");
	include("../includes/functions.php");
	include("../includes/session.php");
?>
<?php
	global $error_in_name,$error_in_email,$error_in_mobile;
	$salt_string="@!";
	
		$name = mysqli_real_escape_string($connection,(mysql_entities_fix_string($_POST['name'])));
		$password = mysqli_real_escape_string($connection,(mysql_entities_fix_string($_POST['password'])));
		$query = "INSERT INTO user_details(name,password) VALUES('$name','$password')";
		$result = mysqli_query($connection,$query);
		if (!$result)
		{
			echo "Signup failed";
		}
		else
		{
			echo "Success Signup";;
		
		}	

?>