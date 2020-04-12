<!DOCTYPE html>
<html>
<head>
	<title> Interface Joueur</title>
	<link rel="stylesheet" type="text/css" href="CSS/Connexion.css">
	<link rel="stylesheet" type="text/css" href="CSS/InterfaceJoueur.css">
</head>
<body>
	<div>
		
		<div class="header"> 

			<div class="logo"> <img src="Images/logo-QuizzSA.png"> </div>
			<div class="definition"> Le plaisir de jouer </div>

		</div>

		<div class="middle">
			<div class="intAdmin">		
				<div class="intJoueurTop"> 
					<div class="leftJoueur">
						<div class="imgIntJoueur">  <img style="height: 90%; width: 17%; border-radius: 90px; margin-top: 5px; margin-bottom: 5px;" src="<?php echo($_SESSION['avatar']); ?>"> </div> <br/>
						<div class="nomPrenomJoueur"> <?php echo $_SESSION['prenom']. ' ' .$_SESSION['nom']; ?></div>
					</div>
					<div class="texteJoueur"> <strong> BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ <br/> JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE </strong> </div>
					<div> <button name="deconnexion" class="deconnexionJoueur">  <a href="Deconnexion.php" style="text-decoration: none; color: white;"><strong>Déconnexion</strong></a></button></div>
				</div>

			</div>

		</div>

	</div>

</body>
</html>