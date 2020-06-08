<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Dane</title>
</head>
<body>

<?php
    include 'menu.php';

	$dataDir = fopen("data/", 'r');
	if(flock($dataDir,LOCK_EX)) {
		if (!file_exists('data/'.$_POST['Blog'])) {
		    mkdir('data/'.$_POST['Blog'], 0777, true);
		    $data = fopen('data/'.$_POST['Blog']."/info", 'w');
		    fputs($data, $_POST['User'] . "\n");
		    fputs($data, md5($_POST['Haslo']) . "\n");
		    fputs($data, $_POST['Opis']);
		    echo "Blog został utworzony!<br/>";
		    fclose($data);
	   } else {
		    echo "Blog o podanej nazwie już istnieje!<br/>";
	   }
		fflush($dataDir);
		flock($dataDir, LOCK_UN);	
	}
?>
</body>
</html>
