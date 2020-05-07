<?php
    $file="utilisateurs";
    $data=file_get_contents("Json/".$file.".json");
    $userData=json_decode($data, true);
    $tab = array();
    foreach ($userData as $key => $user){
        if ($user["profil"] == "joueur") {
            $tab[] = $user;
        }
    }
    $columns = array_column($tab, 'score');
    array_multisort($columns, SORT_DESC, $tab);
    
        ?>
        <table>
            <?php
            foreach ($tab as $key => $value){
            if ($key <5) {
                ?>
                    <tr >
                        <td style=" font-size: 125%; width:45%;"> <?= $value['prenom'] ?> </td>
                        <td style=" font-size: 125%; width:45%;"> <?= $value['nom'] ?> </td>
                        <td style=" font-size: 125%;width:25%; margin-right: 5%;"> <?= $value['score'] ?> </td>
                    </tr>
                    <br/>

                <?php
            }
            ?>
        </table>
        <?php
    }


?>