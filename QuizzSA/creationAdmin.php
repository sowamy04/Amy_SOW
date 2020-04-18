<!DOCTYPE html>
<html>
<head>
	<title> Inscription joueur</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/InscriptionJoueur.css">
</head>
<body>

	<div class="leftRight">
	
		<div class="left"> 
			<div class="leftTop">
				<div style="font-size: 150%; color: black;margin-left: 5%;"> <strong> S'INSCRIRE </strong></div>
				<div style=" font-size: 125%; color: silver;margin-left: 5%;"> Pour tester votre niveau de culture générale</div>
			</div>

			<form action="Inscription.php" method="POST">
				<div class="leftBottom">
					<br/>
					Prénom <br/>
					<input type="text" name="prenom" class="input">
					<!-- <span class="error">* <?php /*echo*/ $prenomErreur;?></span> -->
					<br/><br/>
					Nom <br/><br/>
					<input type="text" name="nom" class="input">
					<!-- <span class="error">* <?php /*echo*/ $nomErreur;?></span> -->
					<br/><br/>
					Login <br/><br/>
					<input type="text" name="login" class="input">
					<!-- <span class="error">* <?php /*echo*/ $loginErreur;?></span> -->
					<br/><br/>
					Password <br/><br/>
					<input type="password" name="password" class="input">
					<!-- <span class="error">* <?php /*echo*/ $passwordErreur;?></span> -->
					<br/><br/>
					Confirmer Password <br/><br/>
					<input type="password" name="repeatPassword" class="input">
					<!-- <span class="error">* <?php /*echo*/ $repeatPasswordErreur;?></span> -->
					<br/><br/>
					Avatar <button name="avatar" style=" float: right; margin-right: 20%; width: 20%; height: 40px; color: white; background-color: #51bfd0; cursor: pointer;"><strong> Choisir un fichier </strong></button>
					<!-- <span class="error">* <?php /*echo*/ $avatarErreur;?></span> -->
					<br/><br/>
					<button name="creerCommpte" style=" float: left; margin-left: 30%; width: 20%; height: 40px; color: white; background-color: #51bfd0; cursor: pointer;"> <strong> Créer un compte </strong></button>

				</div>
			</form>

		</div>

		<div class="right"> 
			<div style="width: 80%; height: 250px; border-radius: 200px; border: 2px solid #51bfd0; margin-top: 25px;"> <img src=""> </div>
			<br/>
			<h3 style=" text-align: center;"> Avatar du joueur </h3>
		</div>

	</div>		
</body>
</html>