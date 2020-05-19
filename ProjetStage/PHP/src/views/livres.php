<?php
require_once 'elements/head.php';
require_once 'elements/carousel.php';
require_once 'elements/footer.php';
require_once '../config/config.php';
require_once '../models/connect.php';



head();
carousel();
$db = connection();

?>


    <!--Articles-->
    <div class="container">

        <div class="row mt-4 d-flex ">
            <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">
                <div class="card">
                    <img src="../../public/img/articles/livres/tome96.png" class="card-img-top img-fluid" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title"  >Manga One Piece - Tome 96 - Edition originale
                        </h6>
                        <p class="card-text">6,90€</p>
                        <a href="#" class="btn btn-danger">AJOUTER AU PANIER</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">
                <div class="card">
                    <img src="../../public/img/articles/livres/roman1.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title"  >Roman Novel - One Piece - Ace 1ere partie
                        </h6>
                        <p class="card-text">6,90€</p>
                        <a href="#" class="btn btn-danger">AJOUTER AU PANIER</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">

                <div class="card">
                    <img src="../../public/img/articles/livres/Tome1.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title"  >Manga One Piece - Tome 1 - Edition originale
                        </h6>
                        <p class="card-text">5,90€</p>
                        <a href="#" class="btn btn-danger">AJOUTER AU PANIER</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
<?php
footer();

