<?php
	require_once("fonctions.php");
	if (isset($_POST['connexion'])) {
		$login=$_POST['login'];
		$password=$_POST["password"];
		$result = connexion($login, $password);
		if ($result=="error") {
			echo "Nom d'utilisateur ou le mot de passe incorrects!";
		}
		else {
			
			header ("location:index.php?lien=".$result);
		}
	}
	
?>

<div class="con">
				
				<div class="loginForm"> Login Form</div>
					<form action="" method="POST" id="form-connexion">
						<div class="intCon"> 
							<div>
								<div class="username">
									<input type="text" name="login" id="login" placeholder="Login" class="logPass" error="error-1">
									<img src="Images/Icones/icone-user.png" class="iconCon">
								</div>
								<div class="error-form" id="error-1"></div>
							</div>
							
			
							<br/> <br/>
			
							<div>
								<div class="pass">
									<input type="password" id="password" name="password" placeholder="Password" class="logPass" error="error-2"> 
									<img src="Images/Icones/icone-password.png" class="iconCon">
								</div>
								<div class="error-form" id="error-2"></div>
							</div>
							
			
							<br/> <br/>
			
							<div>
								
								<button id="connexion" name="connexion" type="submit"> Connexion </button>
								<button id="inscription" name="inscription"> <a href="index.php?lien=inscription" style="text-decoration: none; color: silver;">S'inscrire pour jouer?</a></button>
							</div>
			
						</div>
					</form>
			
				</div>
						
			
			
					
		
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
	const inputs = document.getElementsByTagName("input");
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