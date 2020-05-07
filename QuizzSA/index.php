<!DOCTYPE html>
<html>
<head>
	<title> Connexion </title>
	<meta charset="utf-8">
	<!-- <meta name="viewport" content="width=div, initial-scale=" > -->
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="CSS/index.css">
</head>
<body>

	<div>
		
		<div class="header"> 

			<div class="logo"> <img src="Images/logo-QuizzSA.png"> </div>
			<div class="definition"> Le plaisir de jouer </div>

		</div>

		<div class="middle">
		
		<?php
			session_start();
			require_once("fonctions.php");
	
				if (isset($_GET['lien'])) {
					switch ($_GET['lien']) {
						case 'InterfaceAdmin':
							require_once("InterfaceAdmin.php");
							break;
						
							case 'InterfaceJoueur':
								require_once("InterfaceJoueur.php");
								break;
							
								case 'inscription':
									require_once("InscriptionJoueur.php");
									break;

									default;
					}
				}
				else {
					if (isset($_GET['statut']) && $_GET['statut']==="logout") {
						deconnexion();
					}
					require_once("connexion.php");
					
				}
			
		?>
			
		</div>

	</div>
	

</body>
</html>




