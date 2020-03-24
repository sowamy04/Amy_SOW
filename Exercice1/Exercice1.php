<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Exercice 1</title>

</head>
<body>
	<form method="POST">
		Donner une valeur
		<input type="text" name="nombre">
		<input type="submit" name="bouton" value="ok">
	</form>

	<br/> <br/>

	<?php
		$tp="";
		if (isset($_POST['nombre'])){
			$n = intval($_POST['nombre']);

			if ($n <= 10000){
				echo "veuillez saisir un nombre supérieur à 10000";
			}
			else{
				$t = array();
				$k=0;
				for ($i=1; $i <= $n; $i++){
					$s = 0;
					for ($j=1; $j<=$i; $j++){
						if (($i%$j) == 0){
							$s++;
						}

						}

						if ($s == 2){
							$t[$k] = $i;
							$k++;
					}
				}

			}
			$_SESSION[$tp] = $t;
		}

	if (isset($_SESSION[$tp])) {
	$tab = array("inferieur" => array(), 
				"superieur" => array());
	$valeurTotal = sizeof($_SESSION[$tp]);

		$somme = array_sum($_SESSION[$tp]);

		$moyenne = $somme / $valeurTotal;
		echo 'La moyenne est:  ' .$moyenne;

		foreach ($_SESSION[$tp] as $value) {
			if ($value>$moyenne) {
				array_push($tab["superieur"], $value);
			}
			else{
				array_push($tab["inferieur"], $value);
			}
			
		}

		$NbreParPage = 100;
		$valeurTotalInf = sizeof($tab["inferieur"]);
		$valeurTotalSup = sizeof($tab["superieur"]);
		$NbreDePageInf = ceil($valeurTotalInf / $NbreParPage);
		$NbreDePageSup = ceil($valeurTotalSup / $NbreParPage);
	
		if(isset($_GET['page']))
		{
			$pageActuelle=$_GET['page'];
			
		}
		else{ $pageActuelle=1;
		}
		echo "<br/>";echo "<br/>";
		echo '<div style=" width : 100%; height: 300px; ">';
		echo'
		<div style=" float: left ;width: 40%; height: 300px; background-color: white;">
		<table style="width:100%" cellspacing="0";>
		<legend style="text-align: center"> <strong>Nombres Premiers: Vaaleurs inférieurs à la moyenne</strong></legend>
		<tr>';
		for($i=($pageActuelle-1)*100;$i<$pageActuelle*100;$i+=10)
		{
			for($j=$i;$j<=$i+9;$j++)           
			{
				
				if($j>=$valeurTotalInf)
				{
					break;
				}
				echo'<td style="border: 2px solid grey;">'.$tab["inferieur"][$j].'</td>';
	
			}         
			echo'</tr>';
		} 
		echo'</table>'; 

		for ($i=1; $i <=$NbreDePageInf ; $i++) { 
	
			echo ' <a href="Exercice1.php?page='.$i.'">'.$i.'</a> ';
		}

		echo("<div/>");
		echo "<br/>";echo "<br/>";

		echo '
		<div style=" float: right ;width: 100%; height: 300px; background-color: white;">
		<table style="width:100%" cellspacing="0";>
		<legend style="text-align: center"> <strong>Nombres Premiers: Valeurs superieurs à la moyenne</strong></legend>
		<tr>';
		for($i=($pageActuelle-1)*100;$i<$pageActuelle*100;$i+=10)
		{
			for($j=$i;$j<=$i+9;$j++)           
			{
				
				if($j>=$valeurTotalSup)
				{
					break;
				}
				echo'<td style="border: 2px solid grey;">'.$tab["superieur"][$j].'</td>';
	
			}         
			echo'</tr>';
		} 
		echo'</table>'; 

		for ($i=1; $i <=$NbreDePageSup ; $i++) { 
	
			echo ' <a href="Exercice1.php?page='.$i.'">'.$i.'</a> ';
		}

		echo("<div/>");
		echo "<div/>";
	}

		
	

	 ?>

</body>
</html>