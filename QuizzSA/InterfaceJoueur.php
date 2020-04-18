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

	</div>

</body>
</html>