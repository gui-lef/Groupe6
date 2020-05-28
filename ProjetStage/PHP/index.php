<?php
require_once 'src/views/elements/carousel.php';
require_once 'src/views/elements/head.php';
require_once 'src/views/elements/footer.php';
require_once 'src/config/config.php';
require_once 'src/models/connect.php';

session_start();
head();
carousel();
$db = connection();

?>

    <!--Articles-->
    <div class="container">
        <div class="row mt-4 d-flex ">
            <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">

                <div class="card h-100">
                    <img src="public/img/articles/figurines/zoro.jpeg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title"  >Figurine Roronoa Zoro – Grandista Manga Dimension– 28 cm
                        </h6>
                        <p class="card-text">74,90€</p>
                        <a href="#" class="btn btn-danger">AJOUTER AU PANIER</a>
                    </div>
                </div>

            </div>
            <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4  ">
                <div class="card h-100">
                    <img src="public/img/articles/livres/tome96.png" class="card-img-top w-50 m-auto" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title"  >Manga One Piece - Tome 96 - Edition originale
                        </h6>
                        <p class="card-text">6,90€</p>
                        <a href="#" class="btn btn-danger">AJOUTER AU PANIER</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">

                <div class="card h-100">
                    <img src="public/img/articles/goodies/pc_chopper.jpg" class="card-img-top w-75 m-auto" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title"  >Porte-clés Chopper
                        </h6>
                        <p class="card-text">4,90€</p>
                        <a href="#" class="btn btn-danger">AJOUTER AU PANIER</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

<?php
footer();
