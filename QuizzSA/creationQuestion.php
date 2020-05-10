<?php
	if (isset($_POST['soumettre'])) {
		$reponsePossible=array(
			"multiple" => array(),
			"simple" => array(),
			"texte" => array()
		);

		$bonneReponse=array(
			"multiple" => array(),
			"simple" => array(),
			"texte" => array()
		);

		//Validation backend avec PHP
		$i=1;
		if (isset($_POST['laQuestion'])) {
			$question = $_POST['laQuestion'];
			if (isset($_POST['nbPoints']) && !empty($_POST['nbPoints'])) {
				$nbPoints = $_POST['nbPoints'];
				if (isset($_POST['choix']) && !empty($_POST['choix'])) {
					$choix = $_POST['choix'];
					//Insertion des données dans le tableau
					if ($choix == 3) {
						while (isset($_POST['reponse_'.$i]) && !empty($_POST['reponse_'.$i])) {
							array_push($reponsePossible['multiple'], $_POST['reponse_'.$i]);
							if (!empty($_POST['check_'.$i])) {
								array_push($bonneReponse['multiple'],$_POST['reponse_'.$i] );
							}
							$i++;
						}
					}
					elseif ($choix == 2) {
						while (isset($_POST['reponse_'.$i]) && !empty($_POST['reponse_'.$i])) {
							array_push($reponsePossible['simple'], $_POST['reponse_'.$i]);
							if (!empty($_POST['radio_'.$i])) {
								array_push($bonneReponse['simple'],$_POST['reponse_'.$i] );
							}
							$i++;
						}
					}
					elseif ($choix == 1) {
						if (!empty($_POST['reponseTexte'])) {
							array_push($reponsePossible['texte'], $_POST['reponseTexte']);
							array_push($bonneReponse['texte'], $_POST['reponseTexte']);
						}
					}

					//Insertion des données dans le fichier Json
					if (isset($_POST['soumettre'])) {
						$creerQuestion = array();
						$creerQuestion['question'] = $_POST['laQuestion'];
						$creerQuestion['points'] = $_POST['nbPoints'];
						$creerQuestion['choix'] = $_POST['choix'];
						if ($creerQuestion['choix'] == 1) {
							if (!empty($reponsePossible['texte'])) {
								
								$creerQuestion['bonneReponse'] = $bonneReponse['texte'];
								$filiData = file_get_contents("Json/questions.json");
								$filiData = json_decode($filiData, true);
								$filiData[]=$creerQuestion;
								$filiData = json_encode($filiData);
								file_put_contents("Json/questions.json", $filiData);
							}
						}
						if ($creerQuestion['choix'] == 2) {
							if (!empty($reponsePossible['simple'])) {
								$creerQuestion['reponsePossible']= $reponsePossible['simple'];
								$creerQuestion['bonneReponse']= $bonneReponse['simple'];
								$filiData = file_get_contents("Json/questions.json");
								$filiData = json_decode($filiData, true);
								$filiData[]=$creerQuestion;
								$filiData = json_encode($filiData);
								file_put_contents("Json/questions.json", $filiData);
							}
						}
						if ($creerQuestion['choix'] == 3) {
							if (!empty($reponsePossible['multiple'])) {
								$creerQuestion['reponsePossible']= $reponsePossible['multiple'];
								$creerQuestion['bonneReponse']= $bonneReponse['multiple'];
								$filiData = file_get_contents("Json/questions.json");
								$filiData = json_decode($filiData, true);
								$filiData[]=$creerQuestion;
								$filiData = json_encode($filiData);
								file_put_contents("Json/questions.json", $filiData);
							}
						}
					}
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Création question</title>
	<!-- <link rel="stylesheet" type="text/css" href="CSS/creationQuestions.css">  -->
</head>
<body>
	<form action="" method="POST" id="form-connexion">
		<div>
			<div class="texteQuestion"> PARAMETRER VOTRE QUESTION </div>
			<br/> <br/>
			<div class="CQmiddleQuestion">
				
				<div class="CQinputQuestion">
					<label class="texteQuestionForm"> <strong> Question </strong> </label>
					<input type="text" name="laQuestion" style=" width: 50%; height: 70px; float: left; margin-left: 3%; background-color: #DCDCDC;" error="error-1">
				</div>
				<div class="error-form" id="error-1"></div>
				<br/> <br/> 
				<div>
					<label class="texteQuestionForm"> <strong>Nombre de points  </strong></label>
					<input type="number" name="nbPoints" min="1" max="30" style=" width: 10%; height: 30px; margin-left: 3%; background-color: 	#DCDCDC;" error="error-2">
				</div>
				<div class="error-form" id="error-2"></div>
				<br/>
				<div id="inputs">
					<div class="row">
						<label class="texteQuestionForm"><strong>Type de réponse  </strong></label>
						<select style=" width: 45%; height: 30px; float: left; margin-left: 3%; background-color: #DCDCDC;" name="choix" error="error-3" id="liste">
							<option selected>--Donner le type de réponse--</option>
							<option selected="selected" value="1"> Réponse  texte à saisir </option>
							<option selected="selected" value="2"> Réponse à choix simple </option>
							<option selected="selected" value="3"> Réponse à choix multiple </option>
						</select>
						<button style="text-align: center; margin-left: 5%; float: left; background-color: blue; color: white; font-size: 20px; width: 40px; height:30px; border: solid 1px blue; border-radius: 40px;" onclick="onAddInput()"> + </button>
					</div>
					<div class="error-form" id="error-3"></div>
					<br>
					<br/> <br/>
	
				</div>

				<div style="float: bottom;"> <button type="submit" name="soumettre" style="float: right; color: white; background-color: #51bfd0; width: 23%; height: 30px; font-size: 150%; margin-right: 10%;"> <strong> Soumettre</strong></button></div>
					
			</div>
				
		</div>
	</form>

	<script>
		var nbrRow=0;
		function onAddInput(){
			nbrRow++;
			var divInputs = document.getElementById('inputs');
			var newInput = document.createElement('div');
			newInput.setAttribute('class', 'row');
			newInput.setAttribute('id', 'row_'+nbrRow);
			var valID= 'row_'+nbrRow;
			var i;
			selectBox = document.getElementById("liste");
			
		
			for (i=1; i < selectBox.options.length; i++) 
			{
				if (selectBox.options[1].selected == true) 
				{
					newInput.innerHTML=`<label class="texteQuestionForm"><strong>Reponse: </strong></label>
					<input type="text" name="reponseTexte" class="input" style=" width: 45%; height: 70px; margin-left: 3%; background-color: #DCDCDC;"><br/><br/>`;
					divInputs.appendChild(newInput);
				}

				if (selectBox.options[2].selected == true)
				{
					newInput.innerHTML=`<label class="texteQuestionForm"><strong>Reponse: </strong></label>
					<input type="text" name="reponse_${nbrRow}" class="input2" style=" width: 45%; height: 30px; margin-left: 3%; background-color: #DCDCDC;"> 
					<input type="radio" name="radio_${nbrRow}" class:"radio">
					<button type="button" onclick="onDeleteInput(${nbrRow})" class="btn" style="text-align: center; margin-left: 1%; background-color: red; color: white; font-size: 20px; width: 40px; height:30px; border: solid 1px blue; border-radius: 40px;">X</button><br/><br/>`;
					divInputs.appendChild(newInput);
				}

				if (selectBox.options[3].selected == true) 
				{
					newInput.innerHTML=`<label class="texteQuestionForm"><strong>Reponse: </strong></label>
					<input type="text" name="reponse_${nbrRow}" class="input2" style=" width: 45%; height: 30px; margin-left: 3%; background-color: #DCDCDC;">
					<input type="checkbox" name="check_${nbrRow}" class:"radio"> 
					<button type="button" onclick="onDeleteInput(${nbrRow})"  class="btn" style="text-align: center; margin-left: 1%; background-color: red; color: white; font-size: 20px; width: 40px; height:30px; border: solid 1px blue; border-radius: 40px;">X</button><br/><br/>`;
					divInputs.appendChild(newInput);
				}

			}		
			
		}

		function onDeleteInput(n){
			var target = document.getElementById('row_'+n);
			target.remove();
		}
	</script>
</body>
</html>


<script type="text/javascript" language="javascript">

/* const inputs = document.getElementsByTagName("input");
for (input of inputs){
	input.addEventListener("keyup", function(e)¨{
		if (e.target.hasAttribute("error")) {
			var  idDivError = e.target.getAttribute("error");
			document.getElementById(idDivError).innerText = ""
		}
	})
} */
	
document.getElementById("form-connexion").addEventListener("submit", function(e){
	const inputs = document.getElementsByTagName('input');
	var error = false;
	for (input of inputs){
		if (input.hasAttribute("error")) {
			var  idDivError = input.getAttribute("error"); 
			if (!input.value) {
				document.getElementById(idDivError).innerText = "Ce champ est obligatoire"
				error= true
			}
		}
		else{
			document.getElementById(idDivError).innerText = ""
		}
	}

	if (error) {
		e.preventDefault();
		return false;
	}

})

</script>