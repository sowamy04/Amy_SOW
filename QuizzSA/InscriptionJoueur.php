<?php		
	if (isset($_POST['creerCompte'])) {
		require_once("fonctions.php");

		$format=['image/png','image/jpg','image/jpeg'];
		if (in_array($_FILES['avatar']['type'], $format)) {
			$array=explode('.', $_FILES['avatar']['name']);
			$filename=date('YmdHis').".".$array[sizeof($array)-1];
			if (move_uploaded_file($_FILES['avatar']['tmp_name'], 'Avatar/'.$filename)) {
				$photo= 'Avatar/'.$filename;
				$tab = array();
				$tab['prenom'] = $_POST['prenom'];
				$tab['nom'] = $_POST['nom'];
				$tab['login'] = $_POST['login'];
				$tab['password'] = $_POST['password'];
				$repeatPassword =$_POST['repeatPassword'];
				$tab['avatar'] = $photo;
				$tab['profil'] = "joueur";
				$tab['score'] = 0;
			}  
			else{
				$erreur="format incorrect";
			}
		} 
	
		$result = login_valid($_POST['login']);
		if ($result==true) {
			if ($tab['password'] == $repeatPassword) {
				$file = file_get_contents("Json/utilisateurs.json");
				$filiData = json_decode($file, true);
				$filiData[]=$tab;
				$filiData = json_encode($filiData);
				file_put_contents("Json/utilisateurs.json", $filiData);
				header("location:index.php"); 
			} 

			else{
				echo (" les mots de passe ne sont pas identiques!");
			}
		}
		else{
			echo("Le nom d'utilisateur existe déja!");
		}
		
	}
?>
 
<!DOCTYPE html>
<html>
<head>
	<title> Inscription joueur</title>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="CSS/InscriptionJoueur.css"> -->
</head>
<body>

<div class="IJleftRight">

	<div class="IJleft"> 
		<div class="IJleftTop">
			<div style="font-size: 150%; color: black;margin-left: 5%;"> <strong> S'INSCRIRE </strong></div>
			<div style=" font-size: 125%; color: silver;margin-left: 5%;"> Pour tester votre niveau de culture générale</div>
		</div>

	<form action="" method="POST" id="form-connexion" enctype = "multipart/form-data">
		<div class="IJleftBottom">
			<br/>
			Prénom <br/>
			<input type="text" name="prenom" class="input" error="error-1">
			<div class="error-formIJ" id="error-1"> </div>
			<br/><br/>
			Nom <br/><br/>
			<input type="text" name="nom" class="input" error="error-2">
			<div class="error-formIJ" id="error-2"> </div>
			<br/><br/>
			Login <br/><br/>
			<input type="text" name="login" class="input" error="error-3">
			<div class="error-formIJ" id="error-3"> </div>
			<br/><br/>
			Password <br/><br/>
			<input type="password" name="password" class="input" error="error-4">
			<div class="error-formIJ" id="error-4"> </div>
			<br/><br/>
			Confirmer Password <br/><br/>
			<input type="password" name="repeatPassword" class="input" error="error-5">
			<div class="error-formIJ" id="error-5"> </div>
			<br/><br/>
			Avatar <input name="avatar" type="file"  value="Choisir un fichier" accept="image/*" onchange="loadFile(event);" error="error-6">
			<div class="error-formIJ" id="error-6"> </div>
			<br/><br/>
			<button name="creerCompte" style=" float: left; margin-left: 30%; width: 20%; height: 40px; color: white; background-color: #51bfd0; cursor: pointer; "> <strong> Créer un compte </strong></button>

		</div>
	</form>

</div>

	<div class="IJright"> 
		<img src="Avatar/img5.jpg" id="output" style="width: 50%; height: 150px; border-radius: 50%; border: 2px solid #51bfd0; margin-top: 50px;">
		<br/>
		<h3 style=" text-align: center;"> Avatar du joueur </h3>
	</div>
					
</body>
</html>
<script>
 var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>


<script type="text/javascript" language="javascript">
	
document.getElementById("form-connexion").addEventListener("submit", function(e){
	const inputs = document.getElementsByTagName("input");
	//var error = false;
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