<?php
    session_start();

    $host = "mysql-sowamy04.alwaysdata.net";
    $database = "sowamy04_quiz_sa";
    $username = "sowamy04_quiz";
    $password = "sowthierno"; 
    $message = ""; 

    /* $host = "localhost";
    $database = "quiz_mysql";
    $username = "root";
    $password = "amysow"; 
    $message = "";
 */
    try {
        $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
        $connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        if (isset($_POST['connexion'])) {
            $query  = 'SELECT * FROM utilisateur  where login = :login AND password = :password ';
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'login' => $_POST["login"],
                    'password' => $_POST["password"]
                )
            ); 

            $result = $statement->fetch(PDO::FETCH_ASSOC);
                if ($result['profil'] == 'admin') {
                    header("location:index.php?lien=interfaceAdmin");
                }elseif($result['profil'] == 'joueur') {
                    header("location:index.php?lien=interfaceJoueur");
                }

            $count = $statement->rowCount();
            if ($count > 0) {
                $_SESSION["login"] = $_POST["login"];
                $_SESSION["prenom"] = $result["prenom"];
                $_SESSION["nom"] = $result["nom"];
                $_SESSION["profil"] = $result["profil"];
                $_SESSION["avatar"] = $result["avatar"];
            }
            else {
                $message = '<label> Login ou mot de passe incorrects </label>';
            } 
            
        }
        if (isset($_POST['inscrire'])) {
            $prenomIns = $_POST['prenom'];
            $nomIns = $_POST['nom'];
            $loginIns = $_POST['username'];
            $passwordIns = $_POST['pass'];
            $avatarIns = $_POST['avatar'];
            $statusIns = "actif";
            $profilIns = "joueur";

            $pdoStat = $objPdo->prepare('INSERT INTO utilisateur values (NULL, :prenom, :nom, :login, :password, :avatar, :profil, :statut)');
            $pdoStat->bindValue(':prenom', $prenomIns, PDO::PARAM_STR);
            $pdoStat->bindValue(':nom', $nomIns, PDO::PARAM_STR);
            $pdoStat->bindValue(':login', $loginIns, PDO::PARAM_STR);
            $pdoStat->bindValue(':password', $passwordIns, PDO::PARAM_STR);
            $pdoStat->bindValue(':avatar', $avatarIns, PDO::PARAM_STR);
            $pdoStat->bindValue(':profil', $profilIns, PDO::PARAM_STR);
            $pdoStat->bindValue(':statut', $statusIns, PDO::PARAM_STR);

            $insertIsOK = $pdoStat->execute();
            if ($insertIsOK) {
                echo '<label style="color:green"> Vous êtes ajoutés avec succès! </label>';
            }
            else{
                echo '<label style="color:green"> Echec de l\'insertion! </label>';
            }

        }
    } catch (PDOException $error) {
        $message = $error->getMessage();
    } 

?>

<div class="container">
    

    <?php
        if (isset($message)) {
            echo '<label class="text-danger">' .$message. '</label>';
        } 

    ?>
    <div class="row">
        <form action="" id="registration-form" method="POST" action="../requete/login.php" enctype="multipart/form-data">
            <div class="col-md-6 identification"> 
                <img src="Images/identification.png" class="imageIdentification img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-cir brcle,|}" alt="">
                <div class="form-group">
                    <label for=""> Nom d'utilisateur </label>
                    <input type="text" class="form-control bg-light w-75 inputTexte" name="login" id ="login">
                    <span class="error-form" id="login_error_message"></span> 
                </div>

                <div class="form-group">
                    <label for=""> Mot de passe</label> 
                    <input type="password" class="form-control bg-light w-75 inputTexte" name="password" id="pass"> 
                    <span class="error-form" id="pass_error_message"></span>
                </div>
                <input type="submit" id="connexion" value="Se connecter" class="btn btn-primary" name="connexion"  style="font-weight:bolder;"> 
            </div>

            <div class="col-md-6 inscription"> 
                <div class="form-group">
                    <label for="" class="inscriptionTexte"> INSCRIPTION </label> 
                    <img src="Images/avatar.png" class="img-avatar img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom" class="form-control bg-light w-75 inputTexte">
                    <span class="error-form" id="prenom_error_message"></span>
                </div>
                <div class="form-group">
                    <input type="text" name="nom" id="nom" placeholder="Nom" class="form-control bg-light w-75 inputTexte"> 
                    <span class="error-form" id="nom_error_message"></span>
                </div>
            <div class="form-group">
                    <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" class="form-control bg-light w-75 inputTexte"> 
                    <span class="error-form" id="username_error_message"></span>
                </div>
                <div class="form-group"> 
                    <input type="password" name="pass" id="password" placeholder="Mot de passe" class="form-control bg-light w-75 inputTexte"> 
                    <span class="error-form" id="password_error_message"></span>
                </div>
                <div class="form-group"> 
                    <input type="password" name="repeatPassword" id="repeatPassword" placeholder="Répéter le mot de passe" class="form-control bg-light w-75 inputTexte">  
                    <span class="error-form" id="repeat_error_message"></span>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input w-25" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="avatar">
                        <label class="custom-file-label" for="inputGroupFile01">Choisir une image</label>
                    </div>
                </div>
                
                <input type="submit" value="S'inscrire" name="inscrire" id="inscription" class="btn btn-primary"  style="font-weight:bolder;">  
            </div> 
        </form>  

    </div>  
    
</div>

