<?php
    include 'menu.php';
    $catalog = new RecursiveDirectoryIterator('data/');
    $blogPath = NULL;
    $blogFile = NULL;
    foreach (new RecursiveIteratorIterator($catalog) as $pathToFile => $file) {
        if (!($file->isDir())) {
            if ($_POST['postToComment'] == $file) {
                $blogFile = $file;
                $blogPath = dirname($file);
                }
        }
    }

	$data = fopen("data/", 'r');
	if(flock($data,LOCK_EX)) {
		if (!file_exists($blogFile . ".k")) {
		    mkdir($blogFile . ".k", 0755, true);
		}
		$commentsCatalog = $blogFile . ".k";
		$commentIndex = 0;
		while (file_exists($commentsCatalog . "/" . $commentIndex)) {
		    $commentIndex = $commentIndex + 1;
		}
		$commentFilePath = $commentsCatalog . "/" . $commentIndex;
		$comment = fopen($commentFilePath, "w");
		fputs($comment, $_POST['rodzajKom'] . "\n");
		$timestamp = date("Y-m-d H:i:s");
		fputs($comment, $timestamp . "\n");
		fputs($comment, $_POST['User'] . "\n");
		fputs($comment, $_POST['Opis']);
		fclose($comment);
		fflush($data);
		flock($data, LOCK_UN);
	}
?>

