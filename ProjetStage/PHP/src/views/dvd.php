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
                    <img src="../../public/img/articles/figurines/zoro.jpeg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title"  >Figurine Roronoa Zoro – Grandista Manga Dimension– 28 cm
                        </h6>
                        <p class="card-text">74,90€</p>
                        <a href="#" class="btn btn-danger">AJOUTER AU PANIER</a>
                    </div>
                </div>

            </div>
            <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">
                <div class="card">
                    <img src="../../public/img/articles/figurines/kinenom.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title"  >Figurine Kinemon – DFX The Grandline Men– 21 cm
                        </h6>
                        <p class="card-text">49,90€</p>
                        <a href="#" class="btn btn-danger">AJOUTER AU PANIER</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">

                <div class="card">
                    <img src="../../public/img/articles/figurines/zoro.jpeg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title"  >Figurine Roronoa Zoro – Grandista Manga Dimension– 28 cm
                        </h6>
                        <p class="card-text">74,90€</p>
                        <a href="#" class="btn btn-danger">AJOUTER AU PANIER</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
<?php
footer();