<?php

session_start();

echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/autodata.css">
    <!-- Java Script function welche einen XMLHttpRequest -->
    <script>
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
			xmlhttp.open("GET","autoById.php?q="+id,true);
			xmlhttp.send();
			xmlhttp.close();
		}
	}
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

<section id="selectArea">
<div>
';
include 'autoMenu.php';
echo'
</div>
</section>

<section id="cardArea">
	<div id="autoCard"></div>
</section>

</body>
</html>
'
?>