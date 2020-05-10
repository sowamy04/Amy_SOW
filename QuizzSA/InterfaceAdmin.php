<?php
	is_connect();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Interface Admin</title>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="CSS/style.css">  -->
</head>
<body>
				
	<div class="IAintAdmin">
		<div class="IAadminTop">
			<div class="IAtopDef"> <strong> CREER ET PARAMETRER VOS QUIZZ </strong></div>
			<div> <button class="IAdeconnexion" name="deconnexion"><a href="index.php?statut=logout" style="text-decoration: none; color: white;"><strong>Déconnexion</strong> </a></button> </div>
		</div>

		<div class="IAadminBottom">
			<div class="IAleftAdmin">

				<div class="IAleftAdminTop">
					<div class="IAlogoAdmin"> <img style="height: 90%; width: 85%; border-radius: 80px; margin-left: 8%; margin-top: 5%;" src="<?= $_SESSION['user']['avatar'] ?>"> </div>
					<div style="margin-top: 30px;">
						<div style="float: left; width: 30%; height: 20px; margin-top: 8%; margin-left: 3%;"> <?= $_SESSION['user']['prenom'] ?> </div> <br/> <br/> <br/> <br/>
						<div style="float: left; width: 30%; height: 20px; margin-left: 10%;"> <?= $_SESSION['user']['nom'] ?> </div>
					</div>
				
				</div> 
				<div class="IAleftAdminBottom">
					<ul>
						<a href="index.php?lien=InterfaceAdmin&page=listeQuestions" class="aAdmin"> 
							<div class="IAlisteAdmin">Liste Questions </div>
							<div><img src="Images/Icones/list.png" class="IAimgListe"> </div> 
						</a>
						<a href="index.php?lien=InterfaceAdmin&page=creationAdmin" class="aAdmin">
							<div class="IAlisteAdmin"> Créer Admin </div>
							<div><img src="Images/Icones/plus.jpg" class="IAimgListe"> </div>
						</a>
						<a href="index.php?lien=InterfaceAdmin&page=listeJoueur" class="aAdmin">
							<div class="IAlisteAdmin"> Liste Joueurs </div>
							<div><img src="Images/Icones/listRouge.png" class="IAimgListe"> </div>
						</a>								
						<a href="index.php?lien=InterfaceAdmin&page=creationQuestion" class="aAdmin"> 
							<div class="IAlisteAdmin"> Créer Questions </div>
							<div><img src="Images/Icones/plus.jpg" class="IAimgListe"> </div>
						</a>
					</ul>
				</div>
			</div>

			<div class="IArightAdmin"> 
				<?php
					if (isset($_GET['page'])) {
						$url = $_GET['page'];
						if ($url == "listeQuestions") {
							include("listeQuestions.php");
						}
						elseif ($url == "creationAdmin") {
							include("creationAdmin.php");
						}
						elseif ($url == "listeJoueur") {
							include("listeJoueur.php");
						}
						elseif ($url == "creationQuestion"){
							include("creationQuestion.php");
						}
					}
					else{
						header("location:index.php?lien=InterfaceAdmin&page=listeQuestions");
					}
				?>
			</div>
			

	</div>
</body>
</html>