<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Dodawanie komentarza</title>
</head>
<body>
<?php include 'menu.php'; ?>

<h1>Dodanie komentarza do wpisu</h1>
<form action="koment.php" method="post">
    Rodzaj komentarza
    <select name="rodzajKom">
        <option>Pozytywny</option>    
        <option>Negatywny</option>
        <option>Neutralny</option>
    </select><br/>
  	Komentarz
    <textarea name="Opis" cols="30" rows="5"></textarea><br/>
	Imię/Nazwisko/Pseudonim
    <input type="text" name="User" /><br>

	<input type="reset" value="Wyczyść" />
  	<input type="submit" value="Wyślij!"/>
        <?php
            $toComment=$_GET['toComment'];
            echo "<input type=\"hidden\" name=\"postToComment\" value=$toComment>";
        ?>
</form> 

</body>
</html>
