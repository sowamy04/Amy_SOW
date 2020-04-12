<?php
	
	$json = file_get_contents("Json/Data.json");
	$dataUsers = json_decode($json, true);
	#var_dump(json_decode($json));
	if (isset($_POST['connexion'])) {

		foreach ($dataUsers['utilisateurs'] as $user) {
			if (($_POST['login'] == $user['login']) && ($_POST['password'] == $user['password'])) {
				if ($user['fonction'] == "admin") {
					session_start();
					$_SESSION['prenom'] = $user['prenom'];
					$_SESSION['nom'] = $user['nom'];
					$_SESSION['avatar'] = $user['avatar'];
					include("InterfaceAdmin.php");
				}

				else if ($user['fonction'] == "joueur") {
					session_start();
					$_SESSION['prenom'] = $user['prenom'];
					$_SESSION['nom'] = $user['nom'];
					$_SESSION['avatar'] = $user['avatar'];
					include("InterfaceJoueur.php");
				}
				
			}
			
		}

		if( ($_POST['login'] != $user['login']) || ($_POST['password'] != $user['password'])){
			echo "Login ou mot de passe incorrects";
		}	
	}

	
?>