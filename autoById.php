<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	$q = strval($_GET['q']);
	$con = mysqli_connect('localhost','ThomasDbUsr','&Enceladus73%','account122_');
	if (!$con) {
		die('Could not connect: ' . mysqli_error($con));
	}
	mysqli_select_db($con,"account122_");
	//$sql="SELECT * FROM AutosDB WHERE Name = '".$q."'";
	$sql='SELECT * FROM AutosDB WHERE id="'.$q.'"';
	$result = mysqli_query($con,$sql);

	$marke = "?";
	$name = "?";
	$beschreibung = "?";
	$lnk = "?";
	$hubraum = "?";
	$baujahr = "?";
	$leistung = "?";
	$geschwindigkeit ="?";
		
	if ($result->num_rows >0)
	{
		$row = mysqli_fetch_array($result);
		
		if (!is_null($row['Marke'])) {
			$marke = $row['Marke'];
		}
		if (!is_null($row['Name'])) {
			$name = $row['Name'];
		}
		if (!is_null($row['Beschreibung'])) {
			$beschreibung = $row['Beschreibung'];
		}
		if (!is_null($row['Bildlink'])) {
			$lnk = $row['Bildlink'];
		}
		if (!is_null($row['Hubraum'])) {
			$hubraum = $row['Hubraum'];
		}
		if (!is_null($row['Baujahr'])) {
			$baujahr = $row['Baujahr'];
		}
		if (!is_null($row['Leistung'])) {
			$leistung = $row['Leistung'];
		}
		if (!is_null($row['Geschwindigkeit'])) {
			$geschwindigkeit = $row['Geschwindigkeit'];
		}

		echo '
		<table >
		<tr>
			<td colspan=2>'.$marke.'</td>
		</tr>
		<tr>
			<td colspan=2><img width=300px src='.$lnk.'></img></td>
		</tr>
		<tr>
			<td colspan=2>'.$name.'</td>
		</tr>
		<tr>
		<td>Hubraum</td>
		<td>'.$hubraum.'</td>
		</tr>
		<tr>
		<td>Baujahr</td>
		<td>'.$baujahr.'</td>
		</tr>
		<tr>
		<td>Leistung</td>
		<td>'.$leistung.'</td>
		</tr>
		<tr>
		<td>Geschwindigkeit</td>
		<td>'.$geschwindigkeit.'</td>
		</tr>
		<tr>
		<tr>
		<td colspan=2>'.$beschreibung.'</td>
		</tr>
		</table>
		';
	}
	else
	{
		echo"<p>Query result returns false</p>";
	}
	
	mysqli_close($con);
?>

