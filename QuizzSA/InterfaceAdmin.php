<?php
	is_connect();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Interface Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/InterfaceAdmin.css"> 
</head>
<body>
				
	<div class="intAdmin">
		<div class="adminTop">
			<div class="topDef"> <strong> CREER ET PARAMETRER VOS QUIZZ </strong></div>
			<div> <button class="deconnexion" name="deconnexion"><a href="index.php?statut=logout" style="text-decoration: none; color: white;"><strong>Déconnexion</strong> </a></button> </div>
		</div>

		<div class="adminBottom">
			<div class="leftAdmin">

				<div class="leftAdminTop">
					<div class="logoAdmin"> <img style="height: 90%; width: 85%; border-radius: 80px; margin-left: 8%; margin-top: 5%;" src="<?= $_SESSION['user']['avatar'] ?>"> </div>
					<div style="margin-top: 30px;">
						<div style="float: left; width: 30%; height: 20px; margin-top: 8%; margin-left: 3%;"> <?= $_SESSION['user']['prenom'] ?> </div> <br/> <br/> <br/> <br/>
						<div style="float: left; width: 30%; height: 20px; margin-left: 10%;"> <?= $_SESSION['user']['nom'] ?> </div>
					</div>
				
				</div> 
				<div class="leftAdminBottom">
					<ul>
						<a href="index.php?lien=InterfaceAdmin&page=listeQuestions"> 
							<div class="listeAdmin">Liste Questions </div>
							<div><img src="Images/Icones/list.png" class="imgListe"> </div> 
						</a>
						<a href="index.php?lien=InterfaceAdmin&page=creationAdmin">
							<div class="listeAdmin"> Créer Admin </div>
							<div><img src="Images/Icones/plus.jpg" class="imgListe"> </div>
						</a>
						<a href="index.php?lien=InterfaceAdmin&page=listeJoueur">
							<div class="listeAdmin"> Liste Joueurs </div>
							<div><img src="Images/Icones/listRouge.png" class="imgListe"> </div>
						</a>								
						<a href="index.php?lien=InterfaceAdmin&page=creationQuestion"> 
							<div class="listeAdmin"> Créer Questions </div>
							<div><img src="Images/Icones/plus.jpg" class="imgListe"> </div>
						</a>
					</ul>
				</div>
			</div>

			<div class="rightAdmin"> 
				<?php
					if (isset($_GET['page'])) {
						$url = $_GET['page'];
						if ($url == "listeQuestions") {
							include("listeQuestions.php");
						}
						elseif ($url == "creationAdmin") {
							include ("InscriptionJoueur.php");
						}
						elseif ($url == "listeJoueur") {
							include("listeJoueur.php");
						}
						elseif ($url == "creationQuestion"){
							include("creationQuestion.php");
						}
					}
				?>
			</div>
			

	</div>
</body>
</html>