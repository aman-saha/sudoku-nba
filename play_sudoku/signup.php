<?php 
	include("includes/database_connection.php");
	include("includes/functions.php");
	include("includes/session.php");
?>
<?php
	function get_client_ip() 
	{
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}

	$name = $_POST['name'];
	//echo "$name";
	$ip = get_client_ip();

	//echo $_SERVER['REMOTE_ADDR'];
	$query = "SELECT * FROM users WHERE name = '$name' AND ip_addr='$ip'";
	$result = mysqli_query($connection,$query);
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)==1)
	{
		echo "0";
		$_SESSION['current_username'] = $name;
		$_SESSION['current_ip'] = $ip;
		$_SESSION['logged_in'] = 1;
	}
	else
	{	
		$query = "INSERT INTO users(name,ip_addr) VALUES('$name','$ip')";
		$result = mysqli_query($connection,$query);
		
		if (!$result)
			echo "1";
		else
		{
			$_SESSION['current_username'] = $name;
			$_SESSION['current_ip'] = $ip;
			$_SESSION['logged_in'] = 1;
			echo "2";
		}
	}

?>