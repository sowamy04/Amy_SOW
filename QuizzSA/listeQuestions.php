<?php
	$dataQ = file_get_contents("Json/nbQuestions.json");
	$qData = json_decode($dataQ, true); 
	$_SESSION['nbQuestions'] = $qData['nbQuestions'];

	if (isset($_POST['soumettre'])) {
		$nbQuestions = $_POST['nbQuestions'];
		$_SESSION['nbQuestions'] = $nbQuestions;
		$nbQuestions = intval($nbQuestions);
		#$qData[] = array("nbQuestions" => $nbQuestions);
		$qData['nbQuestions'] = $nbQuestions;
		$dataQuestions = json_encode($qData);
		file_put_contents("Json/nbQuestions.json", $dataQuestions);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Liste Questions</title>
	<link rel="stylesheet" type="text/css" href="CSS/listeQuestions.css">
</head>
<body>
	<div class="listeQuestions">
		<form action="" method="POST">
			<div class="defNbQuestion">
				<br/>
				<label class="texteListe"> Nbre de question/jeu</label>
				<input type="number" name="nbQuestions" min="5" class="nbQuestions" value="<?php echo $_SESSION['nbQuestions']; ?>">
				<input type="submit" name="soumettre" value="OK" style="background-color: #5e90af; height: 30px; width: 6%; cursor: pointer;">
			</div>
			<br/>
		</form>
		<div class="liste">
		<?php
			$file="questions";
			$tab = array();
			$data = file_get_contents("Json/".$file.".json");
			$userData = json_decode($data, true); 
			foreach ($userData as $key => $value) {
					$tab[] = $value;
			} 
			$nbQuestionParPage =5;
			$nbreQuestions = count($tab);
			$nombreDePage = ceil($nbreQuestions/$nbQuestionParPage);
			if (isset($_GET['amy'])) { 
				$pageActuelle = $_GET['amy'];
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

			$indiceD = ($pageActuelle-1)*$nbQuestionParPage;
			$indiceF = $indiceD+$nbQuestionParPage-1;

			for ($i=$indiceD; $i <= $indiceF ; $i++) { 
				if (isset($tab[$i])) {
					echo ' '.($i+1).'- '.$tab[$i]['question'];
					echo "<br/>";
					if ($tab[$i]['choix'] == 1) {
						?>
						<input type="text" class="nbQuestions">
						<?php
						echo "<br/>";
					}
					elseif ($tab[$i]['choix'] == 2) {
						for ($j=0; $j <count($tab[$i]['reponsePossible']) ; $j++) { 
							?>
								<input type="radio">
							<?php
							echo $tab[$i]['reponsePossible'][$j];
							echo "<br/>";
						}
						echo "<br/>";
					}
					elseif ($tab[$i]['choix'] == 3) {
						for ($j=0; $j <count($tab[$i]['reponsePossible']) ; $j++) { 
							?>
								<input type="checkbox">
							<?php
							echo $tab[$i]['reponsePossible'][$j];
							echo "<br/>";
						}
						echo "<br/>";
					}
				}
			}
		
		?>
		</div>
		<div class="bottom">
		<?php
		$suivant = $pageActuelle+1;
		$precedent = $pageActuelle-1;
			if ($pageActuelle >1 ) {
				?>
					<a href="index.php?lien=InterfaceAdmin&page=listeQuestions&amy=<?=$precedent?>"><button class="precedent"> Précédent </button> </a>
				<?php
			}
			if ($pageActuelle !=$nombreDePage ) {
				?>
					<a href="index.php?lien=InterfaceAdmin&page=listeQuestions&amy=<?=$suivant?>"><button class="suivant"> Suivant </button> </a>
				<?php
			}
			
		?>
			
		</div>
	</div>

</body>
</html>