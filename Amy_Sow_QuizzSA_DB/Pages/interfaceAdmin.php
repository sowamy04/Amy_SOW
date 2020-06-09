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
                    <label for="" class="font-size">PAGE D'ADMINISTRATION DU JEU </label>
                </div>

                <div class="col-sm-2 col-md-3 w-25 d-flex align-items-center justify-content-center" > 
                       <button type="button" class="btn btn-primary float-right font-weight:bolder">Déconnexion</button>
                </div>
            </div>
            <div class="container bg-light margin">
                <nav class="navbar navbar-expand-sm  navbar-light">
                    <a href="index.php?lien=interfaceAdmin&page=listeQuestions" class="navbar-brand ">Quiz SA</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
                        <span class="navbar-toggler-icon "> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarMenu">
                        <ul class="navbar-nav">
                           <button type="button" class="btn btn-light">
                                <li class="nav-item"> 
                                    <a href="index.php?lien=interfaceAdmin&page=listeQuestions" class="navlink text-black"> Liste Questions </a> 
                                </li>
                           </button>

                           <button type="button" class="btn btn-light">
                                <li class="nav-item">
                                    <a href="index.php?lien=interfaceAdmin&page=creerAdmin" class="navlink"> Créer Adminstrateur </a> 
                                </li>
                           </button>

                            <button type="button" class="btn btn-light">
                                <li class="nav-item"> 
                                    <a href="index.php?lien=interfaceAdmin&page=listeJoueurs" class="navlink"> Liste Joueur </a> 
                                </li>
                            </button>
                            
                            <button type="button" class="btn btn-light">
                                <li class="nav-item"> 
                                    <a href="index.php?lien=interfaceAdmin&page=creerQuestion" class="navlink"> Créer Question </a> 
                                </li>
                            </button>
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row middleAdmin bg-light">
                <?php
                    if (isset($_GET['page'])) {
						$url = $_GET['page'];
						if ($url == "listeQuestions") {
							include("listeQuestions.php");
						}
						elseif ($url == "creerAdmin") {
							include("creerAdmin.php");
						}
						elseif ($url == "listeJoueurs") {
							include("listeJoueurs.php");
						}
						elseif ($url == "creerQuestion"){
							include("creerQuestion.php");
						}
					}
					else{
                        // header("location:index.php?lien=interfaceAdmin&page=listeQuestions");
                        include("listeQuestions.php");
					}
                ?>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>