<?php
    function removeFirstLine($filename) {
        $file = file($filename);
        $output = $file[0];
        unset($file[0]);
        file_put_contents($filename, $file);
    }
    
    $blogPath = NULL;
    foreach (new RecursiveDirectoryIterator('data/') as $pathToFile => $file) {
        if ($file->isDir()) {
            if ($_POST['blog'] == basename($file)) {
                $blogPath = $file;
            }
        }
    }
    if($_POST["message"] != "") {
        $blog = fopen($blogPath, 'r');
        if(flock($blog,LOCK_EX)) {
            $comPath = $blogPath . "/com";
            if (file_exists($comPath)) {
                $com = fopen($comPath, "r");
                $linecount = 0;
                while(!feof($com)){
                    $line = fgets($com);
                    $linecount++;
                }
                fclose($com);
                if($linecount>100){
                    removeFirstLine($comPath);
                } 
            }
            $com = fopen($comPath, "a");
            $message = trim(preg_replace('/\s+/', ' ', $_POST["message"]));
            fputs($com, $_POST["username"].": ".$message."\n");
            fclose($com);
            fflush($blog);
            flock($blog, LOCK_UN);
        }
        fclose($blogPath);
    }	
?>
