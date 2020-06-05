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
                        <a href="#">
                            <img class="pic-1" src="../../public/img/articles/figurines/<?= $fig->imageFigurine ?>">
                            <img class="pic-2" src="../../public/img/articles/figurines/<?= $fig->image2Figurine ?>">
                        </a>
                        <ul class="social">
                            <li><a href="voirplusarticle.php" data-tip="Voir +"><i class="fa fa-eye"></i></a></li>
                            <li><a href="" data-tip="Modifier l'article"><i class="fa fa-edit"></i></a></li>
                            <li><a href="" data-tip="Supprimer l'article"><i class="fa fa-times-circle"></i></a></li>
                        </ul>

                    </div>

                    <div class="product-content">
                        <h3 class="title"><a href="#"><?= $fig->nomFigurine ?></a></h3>
                        <div class="price"><?= $fig->prixFigurine ?> €

                        </div>
                        <button type="button" class="btn btn-outline-danger mb-1" > Ajouter au panier</button>
                    </div>
                </div>
            </div>


    <?php
        } ?>
        </div>
        <?php

footer();