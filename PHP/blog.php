<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="communicator.css"/>
</head>
<body>

<?php
    include 'menu.php';
    if (!empty($_GET) && $_GET['nazwa'] != NULL) {
        $blogPath = 'data/'.$_GET['nazwa'];
        if(file_exists($blogPath)) {
            echo "<h1>Blog: ".$_GET['nazwa']."<br/><br/>";
            $description = fopen($blogPath."/info", 'r');
            $i = 0;
            while (($line = fgets($description)) !== false) {
                if($i>1) {
                    echo $line."<br/>";
                }
                $i = $i + 1;
            }
            fclose($description);
            echo "<br/>";
            $files = scandir($blogPath);
            foreach($files as $file) {
                if(pathinfo($file, PATHINFO_EXTENSION) == "" && $file !== "." && $file !== ".." && substr($file, -1) != "k" && $file != "info") {
                    echo "<h2>".$file."</h2>";
                    echo "<h3>";
                    $currentFile = fopen($blogPath."/".$file, 'r');
                    while(($line = fgets($currentFile)) !== false) {
                        echo $line."<br/>";
                    }
                    echo "</h3>";
                    fclose($currentFile);
                    $attachments = preg_grep('/'.$file.'[123]/i', $files);
                    $i=1;
                    foreach($attachments as $attachment) {
                        echo "<a href=\"$blogPath/$attachment\">Plik $i</a><br/>";
                        $i = $i + 1;
                    }
                    echo "<form action=\"3.php\" method=\"get\"><button name=\"toComment\" value=\"$blogPath/$file\">Komentarz!</button></form>";                   
                    if(file_exists($blogPath."/".$file.'.k')){
                        $comments = scandir($blogPath."/".$file.'.k');
                        foreach($comments as $comment) {
                            if($comment != ".." && $comment != ".") {
                                $commentContent = fopen($blogPath."/".$file.".k/".$comment, 'r');
                                echo "<h3>";
                                echo fgets($commentContent);
                                echo " o godzinie: ";
                                echo fgets($commentContent);
                                echo "przez: ";
                                echo fgets($commentContent);
                                echo "</h3><p>";
                                while(($line = fgets($commentContent)) !== false) {
                                    echo $line."<br/>";
                                }
                                echo "</p>";
                            }
                            
                        }
                    }      
                }
            }
            include 'communicator.php';      
        } else {
            echo "Nie ma takiego bloga!<br/>";
        }
    } else {
        $blogs = scandir('data');
        echo "Przejrzyj blogi:\n<ul>";
        foreach($blogs as $blog) {
            if($blog !== "." && $blog !== "..") {
                echo "<li><a href=\"blog.php?nazwa=$blog\">$blog</a><br/></li>";
            }
        }
        echo "</ul>";
    }
?>

</body>
</html>
