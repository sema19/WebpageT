<?php
	//header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	//header("Cache-Control: post-check=0, pre-check=0", false);
	//header("Pragma: no-cache");

	//$q = strval($_GET['q']);
	$con = mysqli_connect('localhost','ThomasDbUsr','&Enceladus73%','account122_');
	if (!$con) {
		die('Could not connect: ' . mysqli_error($con));
	}
	mysqli_select_db($con,"account122_");
	//$sql="SELECT * FROM AutosDB WHERE Name = '".$q."'";
	$sql="SELECT distinct Marke FROM AutosDB ORDER BY Marke ASC";
	$result = mysqli_query($con,$sql);
	
	$marke = array();
	$cnt=0;
	echo '<ul>';
	while($row = mysqli_fetch_array($result))
	{
		//echo '<li>'.$row[0].'</li>';
		$marke[$cnt] = $row[0];		
		$cnt = $cnt+1;
	}
	echo '</ul>';

	/*echo '<form>';
	echo '<select id="btnMarke" size="10" multiple>';
	$marke = array();
	$cnt=0;
	while($row = mysqli_fetch_array($result))
	{
		echo '<option>'.$row["Marke"].'</option>';
		$marke[$cnt] = $row[0];
		$cnt = $cnt+1;
	}
	echo '</form>';
	*/
	
	echo '<div id="menu">';
	$cnt2=0;
	while($cnt2 < $cnt)
	{
		echo '
        <li><h2 onmouseover=selectBrand(this.value)>'.$marke[$cnt2].'</h2>';
        echo '<ul>';
		$sql='SELECT id,Name FROM AutosDB WHERE Marke="'.$marke[$cnt2].'"';	
		$result = mysqli_query($con,$sql);
		if ($result==FALSE)
		{
			echo '<p>'.$sql.'<p>';
			echo '<p>ERROR READING CARS</p>';
		}
		else
		{
			while ($row = mysqli_fetch_array($result))
			{
				echo '<li onclick=selectCar('.$row[0].')><p>'.$row[1].'</p></li>';
				/*
				echo '
				<li><h2 onmouseover=selectBrand(this.value)>'.$bauart[$cnt3].'</h2>';
				echo '<ul>';
				$sql='SELECT id,Name FROM AutosDB WHERE Marke="'.$marke[$cnt3].'"';	
				$result = mysqli_query($con,$sql);
				if ($result==FALSE)
				{
					echo '<p>'.$sql.'<p>';
					echo '<p>ERROR READING CARS</p>';
				}
				else
				{
					while ($row = mysqli_fetch_array($result))
					{
						echo '<li onclick=selectCar('.$row[0].')><p>'.$row[1].'</p></li>';
						//
					}

				}
				echo '</ul>';
				echo '</li>';
				$cnt2 = $cnt2+1;
				*/
			}
			
		}
		echo '</ul>';
		echo '</li>';
		$cnt2 = $cnt2+1;
	}
	echo '</div>';

	mysqli_close($con);
?>

