<?php
    session_start();
    include("../Data/data.php");
    global $pdo;       
        
    $query = "SELECT * FROM utilisateur WHERE login = :login AND password = :password";
    $statement = $pdo->prepare($query);

    $statement->execute(

        array(
        'login' => $_POST["login"],
        'password' => $_POST["password"]
        )

    );

    $count = $statement->rowCount();
    if($count > 0) {
        $result= $statement->fetch();

        $_SESSION["prenom"]  = $result['prenom'];
        $_SESSION["nom"] = $result["nom"];
        
        if($result["profil"]=="admin"){
            echo "interfaceAdmin";
        }elseif ($result["profil"]=="joueur"){
            echo "interfaceJoueur";
        }
    }else{
        echo 'failed';
    }

?>