<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Quiz SA</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="JS/script.js"></script>
    <script type="text/javascript" language="javascript" src="JS/connexion.js"></script> 
    
</head>
<body>

        <div class="container-fluid row container-header"> 

            <div class="col text-light text-center float-right font-size texte-header">
                Le plaisir de jouer
            </div>

            <div class="col"> 
                <img src="Images/icone_quizz.png" class="img-header float-right img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="Responsive image">
            </div>
            
        </div>

        <div class="containerMiddle">
            <?php
                session_start();
                if (isset($_GET['lien'])) {
                    switch ($_GET['lien']) {
                        case 'interfaceAdmin':
                            require_once("Pages/interfaceAdmin.php");
                            break;
                        
                            case 'interfaceJoueur':
                                require_once("Pages/interfaceJoueur.php");
                                break;
                                default;
                    }
                }
                else {
                    require_once("Pages/connexionInscription.php");
                    
                }

            ?>

        </div>
    
</body>
</html>