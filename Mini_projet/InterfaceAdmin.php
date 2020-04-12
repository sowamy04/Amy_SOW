<!DOCTYPE html>
<html>
<head>
	<title> Interface Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/InterfaceAdmin.css">
	<link rel="stylesheet" type="text/css" href="CSS/Connexion.css"> 
</head>
<body>

	<div>
		
		<div class="header"> 
			<div class="logo"> <img src="Images/logo-QuizzSA.png"> </div>
			<div class="definition"> Le plaisir de jouer </div>
		</div>

		<div class="middle">
				
				<div class="intAdmin">
				<div class="adminTop">
					<div class="topDef"> <strong> CREER ET PARAMETRER VOS QUIZZ </strong></div>
					<div> <button class="deconnexion" name="deconnexion"><a href="Deconnexion.php" style="text-decoration: none; color: white;"><strong>Déconnexion</strong> </a></button> </div>
				</div>

				<div class="adminBottom">
					<div class="leftAdmin">

						<div class="leftAdminTop">
							<div class="logoAdmin"> <img style="height: 100%; width: 100%; border-radius: 150px;" src="<?php echo($_SESSION['avatar']); ?>"> </div>
							<div style="margin-top: 30px;">
								<div style="float: left; width: 30%; height: 20px;"> <?php echo $_SESSION['prenom']; ?> </div> <br/>
								<div style="float: left; width: 30%; height: 20px; margin-left: 5%;"> <?php echo $_SESSION['nom']; ?> </div>
							</div>
						</div>

						<div class="leftAdminBottom">
							<ul>
								<div> 
									<li>Liste Questions </li>
									 
								</div>
								<div> 
									<li> Créer Admin </li> 
								</div>
								<div> 
									<li> Liste Joueurs </li> 
								</div>
								<div> 
									<li> Créer Questions </li>
								</div>
							</ul>
						</div>

					</div>

					<div class="rightAdmin"> 

					</div>
					

				</div>
				
			</div>

		</div>

	</div>

	<?php

		


	?>


</body>
</html>