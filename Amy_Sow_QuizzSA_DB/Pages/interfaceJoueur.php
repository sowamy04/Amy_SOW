<?php
    session_start(); 
?>
    <div class="container-fluid">

        <div class="container-fluid">
            <div class="row bg-light">
                <div class=" col-md-3 w-25"> 
                    <div class="row ">
                        <img src="<?= $_SESSION['avatar']  ?>" 
                        class="w-25 d-flex align-items-center justify-content-center images img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                    </div>

                    <div class="row">

                        <label for="" class="font-size2 d-flex align-items-center justify-content-center"><?= $_SESSION['prenom']  ?></label> 
                    </div>
                    
                    <div class="row">
                        <label for="" class="font-size2 d-flex align-items-center justify-content-center"><?= $_SESSION['nom']  ?></label>
                    </div>
                        
                </div>

                <div class="col-md-6  w-50 d-flex align-items-center justify-content-center">
                    <label for="" class="font-size">Au plaisir de jouer </label>
                </div>

                <div class="col-sm-2 col-md-3 w-25 d-flex align-items-center justify-content-center" > 
                       <button type="button" class="btn btn-primary float-right font-weight:bolder">Déconnexion</button>
                </div>
            </div>

        </div>

        <div class="container-fluid row bg-light" style="height: 600px; margin-top: 20px;">
            <div class="col-md-9 w-75" style=" margin-top: 20px; border:2px solid silver; border-radius: 2%; margin-top: 10px; margin-bottom: 10px;">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-6 w-75" >
                        <label for="" class="font-size" style=" border:2px solid silver; border-radius: 2%; float:right;"> Question 1/n</label>
                    </div>

                    <div class="col-md-6 w-25">
                        <label for="" class="font-size" style=" border:2px solid silver; border-radius: 2%;"> 3points</label>

                    </div>
                </div>

                <div class="row" style="height: 430px; border:2px solid silver; border-radius: 2%;">
                    
                </div>

                <div class="row" style="margin-top: 20px;">
                <button type="button" class="btn btn-secondary float-left col-md-3 w-25" style="font-weight:bolder"> Précédent</button>
                <label for="" class=" col-md-6 w-50"></label>
                <button type="button" class="btn btn-primary float-right col-md-3 w-25" style="font-weight:bolder"> Suivant</button>
                </div>

            </div>

            <div class="col-md-3 w-25 ">
                <div class="row" style="border:2px solid silver; border-radius: 2%; margin-top: 25%;">
                    <label for=""> Meilleur score: 75 </label>
                </div>

                <div class="row" style="border:2px solid silver; border-radius: 2%; margin-top: 20%;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Rama Sow</td>
                            <td>Diop</td>
                            <td>100</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Yacine</td>
                            <td>Diop</td>
                            <td>98</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>Abdourahmane</td>
                            <td>Ndiaye</td>
                            <td>95</td>
                            </tr>
                            <tr>
                            <th scope="row">4</th>
                            <td>Absa</td>
                            <td>Thiam</td>
                            <td>90</td>
                            </tr>
                            <tr>
                            <th scope="row">5</th>
                            <td>Khadim</td>
                            <td>Sarr</td>
                            <td>85</td>
                            </tr>
                        </tbody>
                        </table>

                </div>
            </div>
            
        </div>
    </div>
