<!DOCTYPE html>
<html>
<head>
	<title> Connexion </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/Connexion.css">
</head>
<body>

	<div>
		
		<div class="header"> 

			<div class="logo"> <img src="Images/logo-QuizzSA.png"> </div>
			<div class="definition"> Le plaisir de jouer </div>

		</div>

		<div class="middle">
			
			<div class="con">
				
				<div class="loginForm"> Login Form</div>
				<form action="users.php" method="POST">
					<div class="intCon"> 

						<div class="username">
							<input type="text" name="login" placeholder="Login" class="logPass" required>
							<img src="Images/Icones/icone-user.png" class="iconCon"> 
						</div>

						<br/> <br/>

						<div class="pass">
							<input type="password" name="password" placeholder="Password" class="logPass" min="3" required> 
							<img src="Images/Icones/icone-password.png" class="iconCon">
						</div>

						<br/> <br/>

						<div>
							
							<button id="connexion" name="connexion" type="submit"> Connexion </button>
							<button id="inscription" name="inscription"> <a href="InscriptionJoueur.php" style="text-decoration: none; color: silver;">S'inscrire pour jouer?</a></button>
						</div>

					</div>
				</form>

			</div>

		</div>

	</div>



</body>
</html>


