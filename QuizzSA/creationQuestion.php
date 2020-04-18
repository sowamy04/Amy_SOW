<!DOCTYPE html>
<html>
<head>
	<title> Création question</title>
	<link rel="stylesheet" type="text/css" href="CSS/creationQuestion.css">
</head>
<body>
	<div>
		<div class="texteQuestion"> PARAMETRER VOTRE QUESTION </div>
		<br/> <br/>
		<div class="middleQuestion">
			
			<div class="inputQuestion">
				<label class="texteQuestionForm"> <strong> Question </strong> </label>
				<input type="text" name="laQuestion" style=" width: 30%; height: 70px; margin-left: 3%;">
			</div>
			<br/> <br/> <br/>
			<div>
				<label class="texteQuestionForm"> <strong>Nombre de points  </strong></label>
				<input type="number" name="nbPoints" style=" width: 10%; height: 30px; margin-left: 3%;">
			</div>
			<br/>
			<div>
				<label class="texteQuestionForm"><strong>Type de réponse  </strong></label>
				<select style=" width: 30%; height: 30px; float: left; margin-left: 3%;" name="choix">
					<option disabled selected>--Donner le type de réponse--</option>
					<option selected="selected" value="1">Réponse  texte à saisir</option>
					<option selected="selected" value="2">Réponse à choix simple</option>
					<option selected="selected" value="3">Réponse à choix multiple</option>
				</select>
				<img src="Images/Icones/ajouter.jpg" style="text-align: center; margin-left: 10px; float: left;">
			</div>
			<br/> <br/>
			<div>
	
			</div>

			<div style="float: bottom;"> <button style="float: right; color: white; background-color: #51bfd0; width: 10%; height: 30px; font-size: 150%; margin-right: 10%;"> <strong> Suivant</strong></button></div>

		</div>
	</div>

</body>
</html>