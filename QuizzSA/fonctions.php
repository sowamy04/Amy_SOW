<?php

function getData($file="utilisateurs"){
    $data=file_get_contents("Json/".$file.".json");
    $data=json_decode($data, true);
    return $data; 
}

function connexion($login, $password){
    $users=getData();
    foreach ($users as $key => $user) {
        if (($user['login']== $login) && ($user['password']==$password)) {
            $_SESSION['user']=$user;
            $_SESSION['statut']="login";
            if ($user['profil']=="admin") {  
                return "InterfaceAdmin ";
            }
            else {
                return "InterfaceJoueur";
            }
        }
         
    }
    return "error";
}

function is_connect(){
    if (!isset($_SESSION['statut'])) {
        header("location:index.php");
    }
}

function deconnexion(){
    unset($_SESSION['user']);
    unset($_SESSION['statut']);
    session_destroy();
}

function login_valid($login){
    $data=file_get_contents("Json/utilisateurs.json");
    $data=json_decode($data, true);
    foreach($data as $value){
        $result=true;
        if ($login == $value['login']) {
            $result = false;
            break;
        }
    }
    return $result;
}

function sort_tab($tab, $cle){
    foreach ($tab as $key => $value) {
        $b[$key] = strtolower($value[$cle]);
    }
    asort($b);
    foreach ($b as $k => $val) {
        $c[] = $val[$k];
    }
    return $c;
}

?>