<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    $total = 5;
    $i=1;
    while($i<=1) { 
        ?>
        <div>
            <div>
                <div>
                    <?php
                    $tab = array();
                    $data = file_get_contents("Json/Questions.json");
                    $userData = json_decode($data, true); 
                    foreach ($userData as $key => $value) {
                        if ($value['profil'] == "joueur") {
                            $tab[] = $value;
                    }   
                    }
                    $colonne = array_column($tab,"score");
                    array_multisort($colonne,SORT_DESC,$tab);
                    $nbreJoueurs = count($tab);
                    #define("nombreJoueurParPage", 15);
                    $nombreDePage = ceil($nbreJoueurs/15);
                    if (isset($_GET['pageliste'])) {
                        $pageActuelle = $_GET['pageliste'];
                        if ($pageActuelle < 1) {
                            $pageActuelle = 1;
                        }
                        elseif ($pageActuelle>$nombreDePage) {
                            $pageActuelle = $nombreDePage;
                        }
                    }
                    else{
                        $pageActuelle = 1;
                    }
            
                    $indiceD = ($pageActuelle-1)*1;
                    $indiceF= $indiceD;
            
                    for ($i=$indiceD; $i <= $indiceF ; $i++) { 
                        if (isset($tab[$i])) {
                            
                        }
                    }
                        
                ?>
            
                    <div class="bottomJoueur">
                        <?php
                        $precedent = $pageActuelle - 1;
                        $suivant = $pageActuelle + 1; 
                        ?>
                                    <a href="index.php?lien=InterfaceJoueur&pageliste=<?= $precedent ?>"><button class="precedent"> Précédent</button></a>
                                
                            
                                    <a href="index.php?lien=InterfaceJoueur&pageliste=<?= $suivant ?>"><button class="suivant"> Suivant </button></a>
                                <?php
                         
                    echo 'Question '.$i.'/'.$total;
                    echo '<br/>';
                    echo "La question";
                    $i++;
                    ?>
                </div>
                <div> Points </div>
                <div> Question </div>
            </div>
            
    <?php    
    
    }

    ?>

            <div>
                <button> Précédent </button>
                <button> Suivant </button>
            </div>
        </div>
                    
</body>
</html>