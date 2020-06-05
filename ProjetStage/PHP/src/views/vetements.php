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

$sqlAddVet="SELECT * FROM vetement";
$reqAddVet=$db->prepare($sqlAddVet);
$reqAddVet->execute();

$tableauAddVet=array();
while ($data=$reqAddVet->fetchObject()){
    array_push($tableauAddVet,$data);
}

?>


    <!--Articles-->
    <div class="container mt-4">
        <div class="row justify-content-center"> <?php foreach ($tableauAddVet as $vet) {?>
            <div class="col-md-4 col-sm-6">
                <div class="product-grid h-100 bg-white">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1" src="../../public/img/articles/vetements/<?= $vet->imageVetement ?>">
                            <img class="pic-2" src="../../public/img/articles/vetements/<?= $vet->image2Vetement ?>">
                        </a>
                        <ul class="social">
                            <li><a href="voirplusarticle.php" data-tip="Voir +"><i class="fa fa-eye"></i></a></li>
                            <li><a href="" data-tip="Modifier l'article"><i class="fa fa-edit"></i></a></li>
                            <li><a href="" data-tip="Supprimer l'article"><i class="fa fa-times-circle"></i></a></li>
                        </ul>

                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#"><?= $vet->nomVetement ?> </a></h3>
                        <div class="price"><?= $vet->prixVetement ?> €

                        </div>
                        <a class="add-to-cart mb-1" href="" >Voir +</a>
                    </div>
                </div>
            </div>
            <?php }
            ?>
    </div>
<?php
footer();


