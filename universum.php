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
echo '
</nav>
';

echo "
<h1>Das Universum</h1>
<p>Das Universum bisitzt zahlreiche Planeten, Asteroriten, Sternen, Sonnensysteme, Schwartze Löcher und Galaxien. Vielleicht sogar andere Tiere die wir nicht kennen. 
Begleite uns und entdecke die großen Geheimnisse des Universiums.</p>
<button>>Planetenspiel</button>
";
?>