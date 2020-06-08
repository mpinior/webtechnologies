<?php
    $blogPath = NULL;
    foreach (new RecursiveDirectoryIterator('data/') as $pathToFile => $file) {
        if ($file->isDir()) {
            if ($_POST['blog'] == basename($file)) {
                $blogPath = $file;
            }
        }
    }
    $date = $_POST["date"];
    $comPath=$blogPath."/com";
    while(!file_exists($comPath) || $date>=filemtime($comPath)) {
        sleep(1);
        clearstatcache();
    }
    echo filemtime($comPath)."\n";
    $com = fopen($comPath, "r");
    while(!feof($com)){
        echo fgets($com);
    }
    fclose($com);
?>
