<?php
require_once 'elements/head.php';
require_once 'elements/carousel.php';
require_once 'elements/footer.php';
require_once '../config/config.php';
require_once '../models/connect.php';


session_start();
head();
carousel();
$db = connection();

$sqlAddFig = "SELECT * FROM figurine";
$reqAddFig = $db->prepare($sqlAddFig);
$reqAddFig->execute();

$tableauAddFig = array();
    while ($data=$reqAddFig->fetchObject()){
        array_push($tableauAddFig,$data);
}

?>

<!--Articles-->
    <div class="container mt-4">
        <div class="row justify-content-center"> <?php foreach ($tableauAddFig as $fig) { ?>
            <div class="col-md-4 col-sm-6">
                <div class="product-grid  h-100 bg-white">
                    <div class="product-image">
                            <img class="pic-1" src="../../public/img/articles/figurines/<?= $fig->imageFigurine ?>">
                            <img class="pic-2" src="../../public/img/articles/figurines/<?= $fig->image2Figurine ?>">
                            <form method="get" action="figurines.php">
                                <ul class="social">
                                    <li><a  data-toggle="modal" data-target="#voirplus" data-tip="Voir +"><i class="fa fa-eye"></i></a></li>
                                    <input type="number" id="idArt" class="d-none" value="<?= $fig->idFigurine ?>">
                                    <li><a href="" data-tip="Modifier l'article"><i class="fa fa-edit"></i></a></li>
                                    <li><a href="" data-tip="Supprimer l'article"><i class="fa fa-times-circle"></i></a></li>
                                </ul>
                            </form>
                    </div>

                    <div class="product-content">
                        <h3 class="title"><a href="#"><?= $fig->nomFigurine ?></a></h3>
                        <div class="price"><?= $fig->prixFigurine ?> €

                        </div>
                        <button type="button" class="btn btn-outline-danger mb-1" > Ajouter au panier</button>
                    </div>
                </div>
            </div>

                <!-- voir + -->
                <div class="modal fade" id="voirplus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" ><?= $fig->nomFigurine ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card h-100 ">
                                    <img src="../../public/img/articles/figurines/<?= $fig->imageFigurine ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="card-title"  ><?= $fig->descriptionFigurine ?>
                                    </h6>
                                    <p class="card-text"><?= $fig->prixFigurine ?> €</p>
                                </div>
                                <div class="col-md-4 col-sm-4 float-right ">
                                    <label for="qte">Quantité</label>
                                    <input type="number" name="qte" value="1" min="1" max="10" step="1"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Retour</button>
                                <button type="button" class="btn btn-outline-danger">Ajouter au panier</button>
                            </div>
                        </div>
                    </div>
                </div>


    <?php
        } ?>
        </div>
        <?php

footer();