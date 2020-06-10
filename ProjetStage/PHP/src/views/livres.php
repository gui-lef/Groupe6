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

$sqlAddLivre="SELECT * FROM livre";
$reqAddLivre=$db->prepare($sqlAddLivre);
$reqAddLivre->execute();

$tableauAddLivre=array();
while ($data=$reqAddLivre->fetchObject()){
    array_push($tableauAddLivre,$data);
}

?>


    <!--Articles-->
    <div class="container mt-4">
        <div class="row justify-content-center"> <?php foreach ($tableauAddLivre as $liv){ ?>
            <div class="col-md-4 col-sm-6">
                <div class="product-grid h-75 bg-white">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1 " src="../../public/img/articles/livres/<?= $liv->imageLivre ?>">
                            <img class="pic-2" src="../../public/img/articles/livres/<?= $liv->image2Livre ?>">
                        </a>
                        <ul class="social">
                            <li><a href="voirplusarticle.php" data-tip="Voir +"><i class="fa fa-eye"></i></a></li>
                            <li><a href="" data-tip="Modifier l'article"><i class="fa fa-edit"></i></a></li>
                            <li><a href="" data-tip="Supprimer l'article"><i class="fa fa-times-circle"></i></a></li>
                        </ul>

                    </div>

                    <div class="product-content">
                        <h3 class="title"><a href="#"><?= $liv->nomLivre ?></a></h3>
                        <div class="price"><?= $liv->prixLivre ?> €

                        </div>
                        <button type="button" class="btn btn-outline-danger mb-1">Ajouter au panier</button>
                    </div>
                </div>
            </div>
<?php
            } ?>
        </div>
<?php
footer();

