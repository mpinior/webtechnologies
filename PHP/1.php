<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Tworzenie bloga</title>
</head>
<body>
<?php	include 'menu.php'; ?>

<h1>Zakładanie blogu</h1>
	<form action="nowy.php" method="post">
		Nazwa Blogu<input type="text" name="Blog"/ ><br>
		Nazwa użytkownia<input type="text" name="User"/ ><br>
		Hasło<input type="password" name="Haslo" /><br>
		Opis<textarea name="Opis" cols="20" rows="4"></textarea><br/>
		<input type="reset" value="Wyczyść"/>
		<input type="submit" value="Wyślij!"/>
	</form> 

</body>
</html>
