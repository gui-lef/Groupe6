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
                <div class="product-grid  bg-white">
                    <div class="product-image">
                        <img class="pic-1" src="../../public/img/articles/vetements/<?= $vet->imageVetement ?>">
                        <img class="pic-2" src="../../public/img/articles/vetements/<?= $vet->image2Vetement ?>">
                        <form method="get" action="vetements.php">

                        <ul class="social">
                            <li><a class="voirplus" data-toggle="modal" data-type="vetements" data-id="<?= $vet->id ?> " data-target="#voirplus" data-tip="Voir +"><i class="fa fa-eye voirplus"></i></a></li>
                            <input type="number" id="idArt" class="d-none" value="<?= $vet->id ?>">
                            <li><a href="" data-tip="Modifier l'article"><i class="fa fa-edit"></i></a></li>
                            <li><a href="" data-tip="Supprimer l'article"><i class="fa fa-times-circle"></i></a></li>
                        </ul>
                        </form>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#"><?= $vet->nomVetement ?> </a></h3>
                        <div class="price"><?= $vet->prixVetement ?> €

                        </div>
                        <a data-toggle="modal" data-target="#voirplus" class="add-to-cart mb-1" href="" >Voir +</a>
                    </div>
                </div>
            </div>

                <!-- voir + -->
                <div class="modal fade" id="voirplus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" ><?= $vet->nomVetement ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card h-100">
                                    <img src="../../public/img/articles/vetements/<?= $vet->imageVetement ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="card-title"  ><?= $vet->descriptionVetement ?>
                                    </h6>
                                    <p class="card-text"><?= $vet->prixVetement ?> €</p>
                                </div>
                                <div class="d-flex flex-column justify-content-between">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 d-flex">
                                            <select class="form-control" name="select">
                                                <option value="" selected="">Taille</option>
                                                <option value="">S</option>
                                                <option value="">M</option>
                                                <option value="">L</option>
                                                <option value="">XL</option>
                                                <option value="">XXL</option>
                                            </select>
                                        </div>
                                                <div class="class=col-md-6 col-sm-6">
                                                    <label for="qte">Quantité</label>
                                                    <input type="number" name="qte" value="1" min="1" max="10" step="1"/>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Retour</button>
                                <button type="button" class="btn btn-outline-danger">Ajouter au panier</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
    </div>
<?php
footer();


