<?php
	is_connect();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Interface Joueur</title>
	<link rel="stylesheet" type="text/css" href="CSS/InterfaceJoueur.css">
</head>
<body>
	<div class="intAdmin">		
		<div class="intJoueurTop"> 
			<div class="leftJoueur">
				<div class="imgIntJoueur">  <img style="height: 90%; width: 17%; border-radius: 90px; margin-top: 5px; margin-bottom: 5px;" src="<?php echo($_SESSION['user']['avatar']); ?>"> </div> <br/>
				<div class="nomPrenomJoueur"> <?php echo $_SESSION['user']['prenom']. ' ' .$_SESSION['user']['nom']; ?></div>
			</div>
			<div class="texteJoueur"> <strong> BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ <br/> JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE </strong> </div>
			<div> <button name="deconnexion" class="deconnexionJoueur">  <a href="index.php?statut=logout" style="text-decoration: none; color: white;"><strong>Déconnexion</strong></a></button></div>
		</div>
		<div class="userContent"> 
			<div class="userLeft">
			<?php
				$tab = array();
				$data = file_get_contents("Json/questions.json");
				$questionData = json_decode($data, true); 
				foreach ($userData as $key => $value) {
					$tab[] = $value;
				}
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

				<div class="userLeftTop">
					<label for=""> Questions <?= $k?> / <?= $_SESSION['nbQuestions'] ?> </label>
					<br>
					<label for=""> <?= $questionData[$i]['question'] ?>   </label>
				</div>
				<div class="userLeftPoints">
					<label for="" class="labelPoint"> Points: <?= $questionData[$i]['points'] ?> </label>
				</div>
				<div class = "UserLeftReponse">
					<?php
						if ($questionData[$i]['choix'] == 1) {
							?>
								<input type="text" name="" id="" placeholder="Donner votre réponse">
							<?php
						}
						elseif ($questionData[$i]['choix'] == 2) {
							for ($j=0; $j <count($questionData[$i]['reponsePossible']); $j++) { 
							?>
								<input type="radio" name="" id="">
							<?php
							echo $questionData[$i]['reponsePossible'][$j];
							echo "<br>";
							}
						}
						elseif ($questionData[$i]['choix'] == 3) {
							for ($j=0; $j <count($questionData[$i]['reponsePossible']); $j++) { 
							?>
								<input type="checkbox" name="" id="">
							<?php
							echo $questionData[$i]['reponsePossible'][$j];
							echo "<br>";
							}
						}

					?>
				</div>
			<?php
				}
			?>
				
				<div class="userLeftBouton">
					<?php
						$precedent = $pageActuelle-1;
						$suivant = $pageActuelle + 1;
						if ($pageActuelle == 1) {
							?>
							<button class="boutonPrecedentDebut"> Précédent </button>
							<button class="boutonSuivant"> <a href="index.php?lien=InterfaceJoueur&bloc=topScore&questionNumber=<?= $suivant ?>"> Suivant </a> </button>
					<?php
						}
						elseif ($pageActuelle == $_SESSION['nbQuestions']) {
							?>
							<button class="boutonPrecedent"> <a href="index.php?lien=InterfaceJoueur&bloc=topScore&questionNumber=<?= $precedent ?>"> Précédent </a> </button>
							<button class="boutonSuivant"> Terminer </button>
					<?php
						}
						else{
					?>	
					<button class="boutonPrecedent"> <a href="index.php?lien=InterfaceJoueur&bloc=topScore&questionNumber=<?= $precedent ?>"> Précédent </a> </button>
					<button class="boutonSuivant"> <a href="index.php?lien=InterfaceJoueur&bloc=topScore&questionNumber=<?= $suivant ?>"> Suivant </a> </button>
					<?php
					}
					?>
				</div>
			</div>
			<form action="" method="GET">
				<div class="userRight">
					<div class="onglet">
						<button type="submit" name="topScore" class="bouton"><a href="index.php?lien=InterfaceJoueur&bloc=topScore" class="bouton1"> Top scrores </a></button> 
						<button type="submit" name="meilleurScore" class="bouton"><a href="index.php?lien=InterfaceJoueur&bloc=meilleurScore" class="bouton2"> Mon meilleur score </a> </button>
					</div>

					<div class="score">
						<?php
							$score='';
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
						?>
						
					</div>
					
				</div>
			</form>
		</div>

	</div>

</body>
</html>