<?php
	include 'menu.php';
	$userFound = False;
	$catalog = new RecursiveDirectoryIterator('data/');
	$blogPath = NULL;
	foreach (new RecursiveIteratorIterator($catalog) as $filePath => $file) {
		if (!($file->isDir())) {
			if ($file->getFileName() == 'info') {
				$lines = file($filePath);
				$usernameFromFile = rtrim($lines[0], "\r\n");
				$passwordFromFile = rtrim($lines[1], "\r\n");
				if ($_POST['User'] == $usernameFromFile) {
					if (md5($_POST['Haslo']) == $passwordFromFile) {
						$userFound = True;
						$blogPath = $file->getPath();
						break;
					}
				}
			}
		}
	}
	if (!$userFound) {
		echo "Błąd logowania<br/>";
	}
	if ($userFound) {
		$postCreated = false;
		$date = str_replace("-", "", $_POST['date']);
		$time = str_replace(":", "", $_POST['time']).date("s");
		$uniqueId = 0;
		
		$data = fopen("data/",'r');
		if(flock($data,LOCK_EX)) {
			do {
				$fileName = $date.$time.str_pad($uniqueId, 2, "0", STR_PAD_LEFT);
				$postPath = $blogPath . "/" . $fileName;
				$uniqueId = $uniqueId + 1;
			} while (file_exists($postPath));
			$file = fopen($postPath, 'w');
			fputs($file, $_POST['opis']);
			$postCreated = true;
			fclose($file);
			fflush($data);
			flock($data, LOCK_UN);		
		}

		if($postCreated) {
			$filesFromFILES = array_values($_FILES);
			$attachments = array();
			print_r($filesFromFILES);
			for ($i = 0; $i < sizeof($filesFromFILES); $i++) {
				if($filesFromFILES[$i]['error']==0) {
					array_push($attachments, $filesFromFILES[$i]);
				}
			}
			$attachmentCounter=1;
			foreach($attachments as $attachment) {
				$extension = pathinfo($attachment['name'], PATHINFO_EXTENSION);
				$targetFile = $postPath.$attachmentCounter. ".".$extension;
				if (file_exists($targetFile)) {
					echo "Plik ".$attachment['name']."juz istnieje! <br/>";
				} else {
					if (move_uploaded_file($attachment["tmp_name"], $targetFile)) {
						echo "Pomyślnie dodano plik ".$attachment['name']."<br/>";
					}
				}
				$attachmentCounter = $attachmentCounter + 1;
			}
		}
        
	}
?>
