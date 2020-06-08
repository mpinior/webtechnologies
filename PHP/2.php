<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Tworzenie wpisu</title>

	<script type="text/javascript" src="data.js"></script>
</head>
<body onload="data();">
<?php include 'menu.php';?>

Wpis na blogu
<form action="wpis.php" method="post" enctype="multipart/form-data">
  	Nazwa użytkownia<input type="text" name="User" /><br>
  	Hasło <input type="password" name="Haslo" /><br>
	Data: <input type="date" id="data"/> <br/>
	Czas: <input type="time" id="czas"/> <br/>
	Wpis<textarea name="opis" cols="30" rows="6"></textarea><br/>
	<input type="file" name="file1" />
	<input type="file" name="file2" />
	<input type="file" name="file3" /><br/>
    <input type="reset" value="Wyczyść"/>
  	<input type="submit" value="Wyślij!"/>
</form> 

</body>
</html>
