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

<section>	
';
	if (isset($_POST["submit"]))
	{
		if ($_POST["submit"]== "Weiter")
		{
			$_SESSION["vokablenReload"]=true;
		}
	}
	if (isset($_SESSION["vokablenReload"]) == false)
	{
		$_SESSION["vokablenReload"]=true;
	}
	if ($_SESSION["vokablenReload"]==true)
	{
		//echo'<p>Reload from Database</p>';
		if (isset($_SESSION["vokablenCnt"]))
		{
			for($i=0; $i<$_SESSION["vokablenCnt"]; $i++)
			{
				unset($_POST["eng".$i]);
			}
		}
		
		$deuNew = array();
		$engNew = array();
		// read from database
		$con = mysqli_connect('localhost','ThomasDbUsr','&Enceladus73%','account122_');
		if (!$con) {
			die('Could not connect: ' . mysqli_error($con));
		}
		mysqli_select_db($con,"account122_");
		$sql="SELECT * FROM vokabeln ORDER BY RAND() LIMIT 3";
		$result = mysqli_query($con,$sql);
		$_SESSION["vokablenCnt"] = $result->num_rows;
		for ($i=0; $i < $_SESSION["vokablenCnt"]; $i++)
		{
			$row = mysqli_fetch_array($result);	
			$deuNew[$i] = $row["Deutsch"];
			$engNew[$i] = $row["English"];
		}
		$_SESSION["vokablenReload"]=false;
		$_SESSION["Deutsch"] = $deuNew;
		$_SESSION["EngAnswer"] = $engNew;
		
		
	}
	
	
	//-----------------------------------------------------------------------------
	$cnt=$_SESSION["vokablenCnt"];
	$deu = $_SESSION["Deutsch"];
	$eng_answer = $_SESSION["EngAnswer"];
	$eng = array();
	$correctCnt=0;
	$all_correct = false;

	echo '
	<h1>VOKABEL TESTER</h1>
	<form method="post">
	<table>
		<tr>
			<td>Nr.</td>
			<td align="center">Deutsch</td>
			<td align="center">English</td>
			<td>OK</td>
		</tr>
	';
	
	for($i=0; $i<$cnt; $i++)
	{
		if (isset($_POST["eng".$i]))
		{
			if ($_POST["eng".$i]==$eng_answer[$i])
			{
				$correctCnt++;
			}
		}
	}
	if ($correctCnt == $cnt)
	{
		
		$all_correct = true;
	}
		
	for($i=0; $i<$cnt; $i++)
	{
		$tc = "black";
		$bc = "white";
		$engSet = isset($_POST["eng".$i]);
		$correct = false;
		$disableOnCorrect = "";
		$nr = $i+1;
		
		$eng[$i] = (isset($_POST["eng".$i]) && is_string($_POST["eng".$i])) ? $_POST["eng".$i] : "";
		
		if (isset($_POST["eng".$i]))
		{
			if ($_POST["eng".$i]==$eng_answer[$i])
			{
				$correct = true;
				$tc = "green";
				$bc = "green";
				$correctCnt=$correctCnt+1;
				//$disableOnCorrect = "disabled";
			}
			else
			{
				// it's empty
				if ($_POST["eng".$i]!="")
				{
					$tc = "red";
					$bc = "red";
				}
				
			}
		}
		
		echo'
		<tr>
			<td>'.$nr.'</td>
			<td>'.htmlentities($deu[$i], ENT_QUOTES, "ISO-8859-1").'</td>
			<td bgcolor='.$bc.'><input type="text" name="eng'.$i.'" value="'.htmlspecialchars($eng[$i]).'" STYLE="color:'.$tc.'" '.$disableOnCorrect.'></input></td>
			<td bgcolor ='.$bc.'></td>
		</tr>
		';
	}
	echo'
	</table>
	<br/>
	';
	if ($all_correct==true)
	{
		$_SESSION["vokablenReload"]=true;
		echo'<p>Bravo! Alle Richtig</p>';
	};
	echo'
	<input id="submit1" type="submit" name="submit" value="Check"></input>
	<input id="submit2" type="submit" name="submit" value="Weiter"></input>
	</form>	
</section>
</body>
</html>
';
?>