<?php 
  include("includes/database_connection.php");
  include("includes/functions.php");
  include("includes/session.php");
?>
<?php
  //echo $_SESSION['logged_in'];
  if($_SESSION['logged_in'])
  {
    $current_username = $_SESSION['current_username'];
    $current_ip = $_SESSION['current_ip']; 
  }
  else
    redirect_to("index.php");
?>
<?php
    $s1 = $_POST['s1'];
    $s2 = $_POST['s2'];
    $s3 = $_POST['s3'];
    $s4 = $_POST['s4'];
    $s5 = $_POST['s5'];
    $s6 = $_POST['s6'];
    $s7 = $_POST['s7'];
    $s8 = $_POST['s8'];
    $s9 = $_POST['s9'];
    for($i=0;$i<9;$i++)
    {
        if(empty($s1[$i]))
            $s1[$i]=0;
        if(empty($s1[$i]))
            $s2[$i]=0;
        if(empty($s1[$i]))
            $s3[$i]=0;
        if(empty($s1[$i]))
            $s4[$i]=0;
        if(empty($s1[$i]))
            $s5[$i]=0;
        if(empty($s1[$i]))
            $s6[$i]=0;
        if(empty($s1[$i]))
            $s7[$i]=0;
        if(empty($s1[$i]))
            $s8[$i]=0;
        if(empty($s1[$i]))
            $s9[$i]=0;
    }
    //print_r($s1);
	// used to compile the c file using exec() in php

    	/*$filename = "sudoku.c";
        $op_file = "amna";
        chmod($filename,0777);
        $command = "gcc -pthread " . $filename . " -o " . $op_file;
        $output = shell_exec($command);
        $output = shell_exec('./amna');    
        if( !empty($output) )                      
        {
            $output = htmlspecialchars($output);
            echo "<pre>$output</pre>";
        }*/
?>
