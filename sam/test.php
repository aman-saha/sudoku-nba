<?php
	// used to compile the c file using exec() in php
    	$filename = "sudoku.c";
        $op_file = "amna";
        chmod($filename,0777);
        $command = "gcc -pthread " . $filename . " -o " . $op_file . " 2>&1";
        $output = shell_exec($command);
        $output = shell_exec('./amna');    
        if( !empty($output) )                      
        {
            $output = htmlspecialchars($output);
            echo "<pre>$output</pre>";
        }

?>
