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
                <div class="product-grid h-75 bg-white">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1" src="../../public/img/articles/dvd/<?= $dvd->imageDvd ?>">
                            <img class="pic-2" src="../../public/img/articles/dvd/<?= $dvd->image2Dvd ?>">
                        </a>
                        <ul class="social">
                            <li><a href="voirplusarticle.php" data-tip="Voir +"><i class="fa fa-eye"></i></a></li>
                        </ul>

                    </div>

                    <div class="product-content">
                        <h3 class="title"><a href="#"><?= $dvd->nomDvd?></a></h3>
                        <div class="price"><?= $dvd->prixDvd ?> €

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