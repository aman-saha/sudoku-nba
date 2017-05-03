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
    $my_file = "solution.txt";
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
        if(empty($s2[$i]))
            $s2[$i]=0;
        if(empty($s3[$i]))
            $s3[$i]=0;
        if(empty($s4[$i]))
            $s4[$i]=0;
        if(empty($s5[$i]))
            $s5[$i]=0;
        if(empty($s6[$i]))
            $s6[$i]=0;
        if(empty($s7[$i]))
            $s7[$i]=0;
        if(empty($s8[$i]))
            $s8[$i]=0;
        if(empty($s9[$i]))
            $s9[$i]=0;
    }
    //print_r($s2);
    $semaphore = 1;
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
    fwrite($handle, $current_username."\n");
    for($i=0;$i<9;$i++)
    {
        fwrite($handle, $s1[$i]." ");
    }
    fwrite($handle, "\n");
    for($i=0;$i<9;$i++)
    {
        fwrite($handle, $s2[$i]." ");
    }
    fwrite($handle, "\n");
    for($i=0;$i<9;$i++)
    {
        fwrite($handle, $s3[$i]." ");
    }
    fwrite($handle, "\n");
    for($i=0;$i<9;$i++)
    {
        fwrite($handle, $s4[$i]." ");
    }
    fwrite($handle, "\n");
    for($i=0;$i<9;$i++)
    {
        fwrite($handle, $s5[$i]." ");
    }
    fwrite($handle, "\n");
    for($i=0;$i<9;$i++)
    {
        fwrite($handle, $s6[$i]." ");
    }
    fwrite($handle, "\n");
    for($i=0;$i<9;$i++)
    {
        fwrite($handle, $s7[$i]." ");
    }
    fwrite($handle, "\n");
    for($i=0;$i<9;$i++)
    {
        fwrite($handle, $s8[$i]." ");
    }
    fwrite($handle, "\n");
    for($i=0;$i<9;$i++)
    {
        fwrite($handle, $s9[$i]." ");
    }
	// used to compile the c file using exec() in php

	$filename = "sudoku.c";
    $op_file = $current_username;
    chmod($filename,0777);
    $command = "gcc -pthread " . $filename . " -o " . $op_file;
    $output = shell_exec($command);
    $output = shell_exec('./'.$op_file);    
    if(!empty($output))                      
    {
        $output = htmlspecialchars($output);
        echo "$output";
    }
?>
