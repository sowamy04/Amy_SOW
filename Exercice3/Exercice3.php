<!DOCTYPE html>
<html>
<head>
	<title> Exercice 3</title>
	<meta charset="utf-8">
</head>
<body>
	<div>
	<div style="margin-left: 30%; margin-top: 20px;">
	<form action="" method="POST">		
		Donner le nombre de mots SVP! <br/> <br/>
		<input style=" height: 20px; width: 25%;" type="text" name="nombre" id="nombre" value="<?= @$_POST['nombre']  ?>"> <br/> <br/>
		<button name="valider" type="submit" style="color: white; background-color: blue; margin-left: 1%; width: 10%; height: 30px;"> Valider </button>
		<button name="annuler" type="reset" style="color: white; background-color: red; margin-left: 1%; width: 10%; height: 30px;"> Annuler </button> <br/> <br/> <br/> <br/>
	
	</div>

	<div style=" margin-left: 15%; margin-right: 15%">

	<?php
	include ("fonction3.php");

		if (isset($_POST['nombre'])) {
			if (is_numeric($_POST['nombre']) && $_POST['nombre']>0) {			
				for ($i=0; $i <$_POST['nombre'] ; $i++) { 
				?>
					Saisir le mot n°<?php echo $i+1; ?> <br/> <br/>
					<input type="text" id="nombre" name="mot[]" value="<?= @$_POST['mot'][$i] ?>" style="height: 20px; width: 80%;"> <br/> <br/>
				<?php
				}

					echo "<br/>"; echo "<br/>";
				?>
					<button name="resultat" style="color: white; background-color: green; margin-left: 35%; margin-right: 40%; width: 10%; height: 40px;"> Resultat </button>
				<?php 
				}
		} 
			?> 

		</form>

			<?php
			$erreurs = [];

			if (isset($_POST['valider'])) {
				if (!est_numeric($_POST['nombre']) || $_POST['nombre']<=0) {
					echo "Veuillez saisir un entier positif svp!";
				}
			}

			echo "<br/>";
					
			if (isset($_POST['resultat'])) {
				foreach ($_POST['mot'] as $k => $value) {
					$value = del_espace($value);
						if (strlen($value)>20) {
							$erreurs[] = 'Mot ' .($k+1). ' a dépassé 20 caractères';
						}
						if (!est_chaine($value)) {
							$erreurs[] = 'Mot ' .($k+1). ' est incorrect';
						}
						if ($value == "") {
							$erreurs[] = 'Mot ' .($k+1). ' est vide';
						}
				}
				var_dump($erreurs);
				var_dump($_POST['mot']);

				$nbr=0;
				if (empty($erreurs)) {
					foreach ($_POST['mot'] as $value) {
						if (contient_caract($value, 'M')) {
							$nbr++;
						}
					}
					echo '<br/> Le nombre de mots qui contient le caractère M/m est: ' .$nbr;	
				}

				else{
					foreach ($erreurs as $erreur) {
						echo '<h4>' .$erreur. '</h4>';
					}
				}

			}
			
			
			
	?>
	
	</div>
	</div>

</body>
</html>