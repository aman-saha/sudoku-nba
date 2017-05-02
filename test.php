<?php
	// used to compile the c file using exec() in php
    	exec('gcc -pthread sudoku.c -o helloworld', $out, $status); 
    if (0 === $status) {
        var_dump($out);
        // used to execute the c file using exec() in php
        exec('./helloworld', $out, $status);
        if (0 === $status) {
            var_dump($out);
        } else {
            echo "Command failed with status: $status";
        }
    } else {
        echo "Command failed with status: $status";
    }
?>
