<?php
// Start the session
session_start();
	
	
function besucher($record) {
  
  $db_host = "localhost";
  $db_username = "root"; 
  $db_password = "Teugn";
  $db_name = "Besucher";
  $db_table = "Alle";
  $counter_page = "access_page";
  $counter_field = "access_counter";

  $db = mysqli_connect ($db_host, $db_username, $db_password, $db_name) or die("Host oder Datenbank nicht erreichbar");

  $sql_call = "INSERT INTO ".$db_table." (".$counter_page.", ".$counter_field.") VALUES ('".$record."', 1) ON DUPLICATE KEY UPDATE ".$counter_field." = ".$counter_field." + 1"; 
  mysqli_query($db, $sql_call) or die("Fehler beim Einfügen");

	$sql_call = "SELECT ".$counter_field. " FROM ".$db_table." WHERE ".$counter_page. " = '".$record. "'";
	$sql_result = mysqli_query($db, $sql_call) or die("SQL-Anfrage fehlgeschlagen");
	$row = mysqli_fetch_assoc($sql_result);
	$x = $row[$counter_field];

	mysqli_close($db);
	return $x;
	
 }


   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">	
	<script>
	<?php
	  $page_name = "Thomas Startseite";
	?>
	</script>
	<title><?php echo $page_name; ?></title>    
    <link rel="stylesheet" href="css/main.css">
    <!-- Java Script function welche einen XMLHttpRequest -->
    <script>

	function showPage(str)
	{
		if (str == "")
		{
			document.getElementById("content").innerHTML = "";
			return;
		} else {
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("content").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","php/content.php?q="+str,true);
			xmlhttp.send();
		}
	}
	
	function selectCar(id)
	{
		if (id == "")
		{
			document.getElementById("txtHint").innerHTML = "";
			return;
		} else {
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("autoCard").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","php/autoById.php?q="+id,true);
			xmlhttp.send();
			xmlhttp.close();
		}
	}
	
	
	

	
	
</script>
</head>

<body>
<header>	
    <h1 id="MainTitle">Thomas</h1>
</header>
	<?php
	  //include "webcounter.php";
	  $anzahl_zugriffe = besucher($page_name);
	?>
<nav>
	<?php include "nav.php" ?>
</nav>

<section>
<div id="content"></div>
</section>

<footer>
  <p>
<?php
    echo "Sie sind bereits der ", $anzahl_zugriffe, ". Besucher auf dieser Seite!";
    ?>
</p>
</footer>
<h3>Wilkommen auf meiner Seite! Wähle eine Richtung aus.</h3>
<a href="thomas.html">Thomas</a>
<hr>
<a href="becky.html">Rebecca</a>
<hr>
<a href="markus.html">Markus</a>
<hr>
</body>
</html>