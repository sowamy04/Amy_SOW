<!DOCTYPE html>
<html>
<head>
	<title> Exercice 4</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST">
		Saisissez un texte SVP! <br/><br/>
		<textarea type="submit" name="pg" cols="60" rows="10" ><?= filter_input(INPUT_POST, 'pg') ?></textarea> <br/><br/>
		<button type="submit" name="bouton" style=" width: 10%; height: 30px; background-color: blue; color: white; margin-left: 10%;"> Soumettre</button>
	</form>
	<br/> <br/>
	<?php

	if (isset($_POST['bouton'])) {

		if (!empty($_POST['pg'])){
		$tab = array();
		$tabValid = array();

		$paragraphe =$_POST['pg'];

		$tab = preg_split('#(?<=[?.!])#', $paragraphe);
		for ($i=0; $i <count($tab) ; $i++) { 
			$tab[$i] = trim($tab[$i]);
		}
		/*echo "les phrases du paragraphe sont: <br/>";
		var_dump($tab);*/
	}

	include ("fonction4.php");
	foreach ($tab as $phrase) {
		if (phrase_valide($phrase)) {
			if (strlen($phrase)<=200) {
				$tabValid[] = $phrase;
			}
		}
	}

	#var_dump($tabValid);
	for ($i=0; $i < count($tabValid); $i++) { 
		$tabValid[$i] = preg_replace('#[\s]+#', ' ', $tabValid[$i]);
	}
	echo "les phrases valides sont: <br/>";
	?>
	<textarea cols="60" rows="10" readonly="readonly"><?php for ($i=0; $i < count($tabValid) ; $i++) { 
				echo $tabValid[$i];
				echo "\n"; echo "\n";
			}
		?> </textarea>

	<?php 

	}

	?>

</body>
</html>