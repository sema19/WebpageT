<?php
/* VOKABELEINGABE */

session_start();
echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/main.css">
    <!-- Java Script function welche einen XMLHttpRequest -->
    <script>
	</script>
</head>
<body>
<header>
';
    include "header.php";
echo'
</header>
<nav>
';
	include "nav.php";
echo'
</nav>

<section>	
	<form method="POST" action="VocabelDB.php">
	<p>Passwort:</p>
	<input type=text name="PW"></input>
';
	
echo'
	<table>
		<tr>
			<th>Deutsch:</th>
			<th>Englisch:</th>
		</tr>
		';

	for($i=0;$i<10;$i++)
	{
		
		echo'
		<tr>
			<td><input type="text" name="deu'.$i.'"></input></td>	
			<td><input type="text" name="eng'.$i.'"></input></td>
		</tr>
		
		';
	}
	echo'
	</table>
	<input id="submit1" type="submit" name="submit" value="OK"></input>
	</form>	
</section>
</body>
</html>
';
?>