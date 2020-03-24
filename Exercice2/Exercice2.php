<!DOCTYPE html>
<html>
<head>
	<title> Exercice 2</title>
</head>
<body>

	<form method="POST"> 
		Choisissez une langue SVP! (Choose one language please!)<br/> <br/>

		<select type="text" name="langue" style="width: 10%; height: 30px;">
			<option value=""> Sélectionner</option>
			<option value="1"  <?php if ($_POST['langue'] == 1){ echo 'selected= "selected"';} ?>> Français</option> &nbsp; &nbsp; &nbsp; &nbsp;
			<option value="2" <?php if ($_POST['langue'] == 2){echo 'selected= "selected"';} ?>> Anglais</option>
			<input type="submit" name="ok" value="ok" style="width: 5%; height: 30px; margin-left: 1%;"> 
		</select>
	</form>
	<table border= 3px;>
	<?php
	$i=1;
	$k=0;
		$tab  = array(
			'Fr' => array(1 => "Janvier" , "Février", "Mars", "Avril", "Mai", "Juin", "juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"), 
			'En'  => array(1 => "January", "Febrary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ) );
		echo "<br/>"; echo "<br/>"; echo "<br/>";
 

		if (!empty($_POST['langue'])) {

			if ($_POST['langue'] == 1) {
		
				foreach ($tab["Fr"]  as $compt => $value) {
					echo "<td>$i</td> <td>$value</td>";
					
					if ($i%3==0){
						echo "</tr>";
					}
					$i++;
				}
			} 

			if ($_POST['langue'] == 2){
		
				foreach ($tab["En"]  as $compt => $value) {
					echo "<td>$i</td> <td>$value</td>";
					

					if ($i%3==0){
						echo "</tr>";
					}
					$i++;
				}
			}
		}
			
	?>
</table>

</body>
</html>