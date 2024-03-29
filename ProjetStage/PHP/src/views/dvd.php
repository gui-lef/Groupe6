<?php
require_once 'elements/head.php';
require_once 'elements/carousel.php';
require_once 'elements/footer.php';
require_once '../config/config.php';
require_once '../models/connect.php';
require_once '../../vendor/autoload.php';

session_start();
head();
carousel();
$db = connection();

$sqlAddDvd="SELECT * FROM dvdbluray";
$reqAddDvd=$db->prepare($sqlAddDvd);
$reqAddDvd->execute();

$tableauAddDvd= array();
while ($data=$reqAddDvd->fetchObject()){
    array_push($tableauAddDvd,$data);
}

?>

    <!--Articles-->
    <div class="container mt-4">
        <div class="row justify-content-center"> <?php foreach ($tableauAddDvd as $dvd) { ?>
            <div class="col-md-4 col-sm-6">
                <div class="product-grid h-100 bg-white">
                    <div class="product-image">
                            <img class="pic-1" src="../../public/img/articles/dvd/<?= $dvd->imageDvd ?>">
                            <img class="pic-2" src="../../public/img/articles/dvd/<?= $dvd->image2Dvd ?>">
                            <form method="get" action="dvd.php">
                                <ul class="social">
                                    <li><a class="voirplus" data-toggle="modal" data-type="dvd" data-id="<?= $dvd->id ?> " data-target="#voirplus" data-tip="Voir +"><i class="fa fa-eye voirplus"></i></a></li>
                                    <input type="number" id="idArt" class="d-none" value="<?= $dvd->id ?>">
                                    <li><a href="" data-tip="Modifier l'article"><i class="fa fa-edit"></i></a></li>
                                    <li><a href="" data-tip="Supprimer l'article"><i class="fa fa-times-circle"></i></a></li>
                                </ul>
                            </form>

                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#"><?= $dvd->nomDvd ?></a></h3>
                        <div class="price"><?= $dvd->prixDvd ?> €

                        </div>
                        <button type="button" class="btn btn-outline-danger mb-1" > Ajouter au panier</button>
                    </div>
                </div>
            </div>

    <!-- voir + -->


    <?php
} ?>
    <div class="modal fade" id="voirplus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card h-100 ">
                        <img src="../../public/img/articles/dvd/" class="card-img-top modal-pic" alt="...">
                    </div>
                    <div class="card-body text-center">
                        <h6 class="card-title card-description">
                        </h6>
                        <p class="card-text card-prix"> </p>
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
        </div>

<?php

footer();
