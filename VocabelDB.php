<?php
if (isset($_POST["submit"]))
	{
		if (isset($_POST["PW"]))
		{
			if ($_POST["PW"]=="Jupiter€pa")
			{
								// write to database
				$con = mysqli_connect('localhost','ThomasDbUsr','&Enceladus73%','account122_');
				if (!$con) {
					die('Could not connect: ' . mysqli_error($con));
				}
				mysqli_select_db($con,"account122_");
				$datum = new DateTime();
				$colStr = "(Deutsch,English,AddedDate)";
				
				for($i=0;$i<10;$i++)
					{
						if (isset($_POST['deu'.$i]) && isset($_POST['eng'.$i]))
						{
							if (strlen($_POST['deu'.$i])>0 && strlen($_POST['eng'.$i])>0)
							{	
								$deuStr = htmlentities( $_POST["deu".$i], ENT_QUOTES, "ISO-8859-1");
								$engStr = $_POST["eng".$i];
								$datStr = $datum->format('Y.m.d');
								$sql="INSERT INTO vokabeln ".$colStr." VALUES ('".$deuStr."','".$engStr."','".$datStr."')";
								$result = mysqli_query($con,$sql);							
							}
						}
			        }
					mysqli_close($con);
			}		
			else
			{
				echo 'DEIN PASSWORT '.$_POST["PW"].'IST FALSCH!';
			}
		}
		
		
		
		
	}
	
	
	
?>