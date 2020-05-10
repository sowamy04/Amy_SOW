<?php
	is_connect();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Interface Joueur</title>
	<!-- <link rel="stylesheet" type="text/css" href="CSS/InterfaceJoueur.css"> -->
</head>
<body>
	<div class="intJintAdmin">	
		<div class="intJintJoueurTop">
			<div class="intJleftJoueur">
				<div class="intJimgIntJoueur">  <img style="height: 90%; width: 30%; border-radius: 90px; margin-top: 5px; margin-bottom: 5px;" src="<?php echo($_SESSION['user']['avatar']); ?>"> </div> <br/>
				<div class="intJnomPrenomJoueur"> <?php echo $_SESSION['user']['prenom']. ' ' .$_SESSION['user']['nom']; ?></div>
			</div>
			<div class="intJtexteJoueur"> <strong> BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ <br/> JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE </strong> </div>
			<div> <button name="deconnexion" class="intJdeconnexionJoueur">  <a href="index.php?statut=logout" style="text-decoration: none; color: white;"><strong>Déconnexion</strong></a></button></div>
		</div>
		<div class="intJuserContent"> 
			<div class="intJuserLeft"> 
			<?php
				$nbrePoints = 0;
				$reponseValide = array();
				$tab = array();
				$data = file_get_contents("Json/questions.json");
				$questionData = json_decode($data, true);
				shuffle ($questionData);
				/* foreach ($userData as $key => $value) {
					$tab[] = $value;
				} */
				$nbQuestions = file_get_contents("Json/nbQuestions.json");
				$nbQuestionsData = json_decode($nbQuestions, true);
				$nbQuestions = $nbQuestionsData['nbQuestions'];
				$_SESSION['nbQuestions'] = $nbQuestions;
				if (isset($_GET['questionNumber'])) {
					$pageActuelle = $_GET['questionNumber'];
					if ($pageActuelle < 1) {
						$pageActuelle = 1;
					}
					elseif ($pageActuelle>$_SESSION['nbQuestions']) {
						$pageActuelle = $_SESSION['nbQuestions'];
					}
				}
				else{
					$pageActuelle = 1;
				}
		
				$indiceD = ($pageActuelle-1)*1;
				$indiceF= $indiceD;

				for ($i=$indiceD; $i <= $indiceF; $i++) { 
					$k= $i+1;
			?>

				<div class="intJuserLeftTop">
					<label for=""> Questions <?= $k?> / <?= $_SESSION['nbQuestions'] ?> </label>
					<br>
					<label for=""> <?= $questionData[$i]['question'] ?>   </label>
				</div>
				<div class="intJuserLeftPoints">
					<label for="" class="intJlabelPoint"> Points: <?= $questionData[$i]['points'] ?> </label>
				</div>
				<div class = "intJUserLeftReponse">
					<?php
						if ($questionData[$i]['choix'] == 1) {
							?>
								<input type="text" name="text<?=$i?>" id="text<?=$i?>" placeholder="Donner votre réponse">
							<?php
							if (isset($_POST['text'.$i])) {
								$reponseValide[$i] = $_POST['text'.$i];
								if ($reponseValide[$i] == $questionData[$i]['bonneReponse']) {
									$nbrePoints = $nbrePoints + $questionData[$i]['points'];
								}
							}
						}
						elseif ($questionData[$i]['choix'] == 2) {
							$nbreponseUser = 0;
							$nbrBonneReponse = count($questionData[$i]['bonneReponse']);
							for ($j=0; $j <count($questionData[$i]['reponsePossible']); $j++) {
							?>
								<input type="radio" name="radio<?=$j?>" id="radio<?=$j?>">
							<?php
							echo $questionData[$i]['reponsePossible'][$j];
							echo "<br>";
							}
							if (isset($_POST['radio'.$j])) {
								if (array_search($questionData[$i]['reponsePossible'][$j], $questionData[$i]['bonneReponse'])) {
									$nbreponseUser++;
								}
							}
							if ($nbreponseUser == $nbrBonneReponse) {
								$nbrePoints = $nbrePoints + $questionData[$i]['points'];
								echo $nbrePoints;
							}
						}
						elseif ($questionData[$i]['choix'] == 3) {
							$nbreponseUser = 0;
							$nbrBonneReponse = count($questionData[$i]['bonneReponse']);
							for ($j=0; $j <count($questionData[$i]['reponsePossible']); $j++) { 
							?>
								<input type="checkbox" name="check<?=$j?>" id="check<?=$j?>">
							<?php
							echo $questionData[$i]['reponsePossible'][$j];
							echo "<br>";
							}
							if (isset($_POST['check'.$j])) {
								if (array_search($questionData[$i]['reponsePossible'][$j], $questionData[$i]['bonneReponse'])) {
									$nbreponseUser++;
								}
							}
							if ($nbreponseUser == $nbrBonneReponse) {
								$nbrePoints = $nbrePoints + $questionData[$i]['points'];
								
							}
						}

					?>
				</div>
			<?php
				}
			?>
				
				<div class="intJuserLeftBouton">
					<?php
						$precedent = $pageActuelle-1;
						$suivant = $pageActuelle + 1;
						if ($pageActuelle == 1) {
							?>
							<button class="intJboutonPrecedentDebut"> Précédent </button>
							<button class="intJboutonSuivant"> <a href="index.php?lien=InterfaceJoueur&bloc=topScore&questionNumber=<?= $suivant ?>"> Suivant </a> </button>
					<?php
						}
						elseif ($pageActuelle == $_SESSION['nbQuestions']) {
							?>
							<button class="intJboutonPrecedent" name="precedent"> <a href="index.php?lien=InterfaceJoueur&bloc=topScore&questionNumber=<?= $precedent ?>"> Précédent </a> </button>
							<button class="intJboutonSuivant" name= "terminer"> Terminer </button>
					<?php
						}
						else{
					?>	
					<button class="intJboutonPrecedent" name="precedent"> <a href="index.php?lien=InterfaceJoueur&bloc=topScore&questionNumber=<?= $precedent ?>"> Précédent </a> </button>
					<button class="intJboutonSuivant" name="suivant"> <a href="index.php?lien=InterfaceJoueur&bloc=topScore&questionNumber=<?= $suivant ?>"> Suivant </a> </button>
					<?php
					}
					?>
				</div>
			</div>
			<form action="" method="GET">
				<div class="intJuserRight">
					<div class="intJonglet">
						<button type="submit" name="topScore" class="intJbouton"><a href="index.php?lien=InterfaceJoueur&bloc=topScore" class="intJbouton1"> Top scrores </a></button> 
						<button type="submit" name="meilleurScore" class="intJbouton"><a href="index.php?lien=InterfaceJoueur&bloc=meilleurScore" class="intJbouton2"> Mon meilleur score </a> </button>
					</div>

					<div class="intJscore">
						<?php
							if (isset($_GET['bloc'])) {
								if ($_GET['bloc'] == "topScore") {
									include ("topScore.php");
								}
				
								else if ($_GET['bloc'] == "meilleurScore"){
									if ($_SESSION['user']['score'] == 0) {
										echo "Vous n'avez pas encore joué au jeu!";
									}
									else{
										?>
											<div style= "padding: 25%; font-size: 200%;">
										<?php
										echo 'SCORE: '. $_SESSION['user']['score'];
										?>
											</div>
										<?php
									}
								}
							}
							else{
								header("location:index.php?lien=InterfaceJoueur&bloc=topScore");
							}
						?>
						
					</div>
					
				</div>
			</form>
		</div>

	</div>

</body>
</html>

<?php

if (isset($_Post['terminer'])) {
	echo 'Vous avez gagné '. $nbrePoints.' de points';
}

?>