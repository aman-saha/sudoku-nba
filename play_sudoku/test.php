<?php 
  /*include("includes/database_connection.php");
  include("includes/functions.php");
  include("includes/session.php");*/
?>
<?php
  //echo $_SESSION['logged_in'];
  /*if($_SESSION['logged_in'])
  {
    $current_username = $_SESSION['current_username'];
    $current_ip = $_SESSION['current_ip']; 
  }
  else
    redirect_to("index.php");*/
?>
<?php
    /*$s1 = $_POST['s1'];
    $s2 = $_POST['s2'];
    $s3 = $_POST['s3'];
    $s4 = $_POST['s4'];
    $s5 = $_POST['s5'];
    $s6 = $_POST['s6'];
    $s7 = $_POST['s7'];
    $s8 = $_POST['s8'];
    $s9 = $_POST['s9'];*/

    $filename = "sudoku.c";
        $op_file = "amna";
        //chmod($filename,0777);
        $command = "gcc -pthread " . $filename . " -o " . $op_file . " 2>&1";
        $output = shell_exec($command);
        $output = shell_exec('./amna');    
        if( !empty($output) )                      
        {
            $output = htmlspecialchars($output);
            echo "<pre>$output</pre>";
        }
?>
