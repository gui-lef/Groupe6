<?php
require_once 'elements/head.php';
require_once 'elements/footer.php';
require_once '../config/config.php';
require_once '../models/connect.php';

head();
$db = connection();

?>
    <div ><h4 class="d-flex justify-content-center mt-3">MON PANIER: 80,90€</h4>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-xs-4 col-sm-4 col-md-4  col-lg-4  col-xl-4 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-light artpanier d-flex justify-content-center">1 ARTICLE AU PANIER</h5>
                    <form>
                        <div class="d-flex">
                            <div class=" col-xs-3 col-sm-3 col-md-3  col-lg-3  col-xl-3 ">
                                <img src="../../public/img/articles/figurines/minizoro.jpg " class="" alt="...">
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-8  col-lg-8  col-xl-8">

                                <h6 class="card-title "  >Figurine Roronoa Zoro – Grandista Manga Dimension– 28 cm
                                </h6>
                                <p class="card-text text-danger ">74,90€</p>
                                <p>Quantité : 1</p>
                                <a class="infofoot" href="#">Modifier la quantité</a> <a class="infofoot" >|</a>
                                <a class="infofoot"  href="#">supprimer</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-light artpanier d-flex justify-content-center">RECAPITULATIF</h5>
                    <div>
                        <p> Total produits : 74,90€</p>
                        <p>Livraison : 6 €</p>
                        <p>Total commande : 80,90 €</p>
                    </div>
                    <form>

                        <button type="submit" class="btn bg-danger text-light">Commander</button>
                    </form>
                </div>
            </div>
        </div>
<?php
footer();

