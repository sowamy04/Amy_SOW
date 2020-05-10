<!DOCTYPE html>
<html>
<head>
	<title> Liste Joueurs</title>
	<!-- <link rel="stylesheet" type="text/css" href="CSS/listeJoueur.css"> -->
</head>
<body>
	<div class="LJjoueurListe">
		<div class="LJtopJoueur"> <strong> LISTE DES JOUEURS PAR SCORE </strong></div>
		<div class="LJmiddleJoueur">
			<?php
		$file="utilisateurs";
		$tab = array();
		$data = file_get_contents("Json/".$file.".json");
		$userData = json_decode($data, true); 
		foreach ($userData as $key => $value) {
			if ($value['profil'] == "joueur") {
				$tab[] = $value;
		}   
		}
		$colonne = array_column($tab,"score");
		array_multisort($colonne,SORT_DESC,$tab);
		$nbreJoueurs = count($tab);
		define("nombreJoueurParPage", 15);
		$nombreDePage = ceil($nbreJoueurs/15);
		if (isset($_GET['pageliste'])) {
			$pageActuelle = $_GET['pageliste'];
			if ($pageActuelle < 1) {
				$pageActuelle = 1;
			}
			elseif ($pageActuelle>$nombreDePage) {
				$pageActuelle = $nombreDePage;
			}
		}
		else{
			$pageActuelle = 1;
		}

		$indiceD = ($pageActuelle-1)*15;
		$indiceF= $indiceD+15-1;
		?>
		<table>
		<tr style="border-spacing: 10%;">
			<th style="width:30%;">Prénom</th>
			<th style="width:30%;">Nom</th>
			<th style="width:30%;">Score</th>
		</tr>
		<?php

		for ($i=$indiceD; $i <= $indiceF ; $i++) { 
			if (isset($tab[$i])) {
				?>
					<tr>
						<td style="text-align: center;"><?php echo $tab[$i]['prenom'];?></td>
						<td style="text-align: center;"><?php echo $tab[$i]['nom'];?></td>
						<td style="text-align: center;"><?php echo $tab[$i]['score'];?></td>
					</tr> 
				<?php 
			}
		}
			
	?>
		</table>
		</div>

		<div class="LJbottomJoueur">
			<?php
			$precedent = $pageActuelle - 1;
			$suivant = $pageActuelle + 1; 
				if ($pageActuelle > 1) {
					?>
						<a href="index.php?lien=InterfaceAdmin&page=listeJoueur&pageliste=<?= $precedent ?>"><button class="LJprecedent"> Précédent</button></a>
					<?php
				}
				if ($pageActuelle != $nombreDePage ) {
					?>
						<a href="index.php?lien=InterfaceAdmin&page=listeJoueur&pageliste=<?= $suivant ?>"><button class="LJsuivant"> Suivant </button></a>
					<?php
				}
			?>
		</div>
	</div>

</body>
</html>
