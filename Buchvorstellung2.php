<?php

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
<h1>Buch</h1>
<h1>Skulduggery Pleasent</h1>

<table border="1" cellspacing="1" cellpadding="2">
	<tr>
        <td><p>Reihe</p></td>
        <td><p>Skulduggery Pleasent</p></td>
    </tr>
	<tr>
        <td><p>Titel</p></td>
        <td><p>01 - Der Gentleman mit der Feuerhand</p></td>
    </tr>
    <tr> 
		<td><p>Autor</p></td>
        <td><p>Derek Landy</p></td>
	</tr>
	<tr> 
		<td><p>ISBN</p></td>
        <td><p>978-3785559222</p></td>
	</tr>   
</table>

<img width="20%" height="20%" src="img/Skulduggery.jpg"></img>
<img width="20%" height="20%" src="img/Skulduggery2.jpg" />
</body>
</html>
';
?>