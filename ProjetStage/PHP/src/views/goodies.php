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

?>


<!--Articles-->
<div class="container">
    <div class="row mt-4 d-flex ">
        <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">

            <div class="card h-100">
                <img src="../../public/img/articles/goodies/pc_chopper.jpg" class="card-img-top w-75 m-auto" alt="...">
                <div class="card-body text-center">
                    <h6 class="card-title"  >Porte-clés Chopper
                    </h6>
                    <p class="card-text">4,90€</p>
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
</div>

<!--footer -->
<footer class="mt-3">
    <div class="card-body bg-bluedark text-light " >
        <div class="container-fluid ">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3  col-lg-2  col-xl-3 ">
                    <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12  col-xl-12 ">
                        <h5 class="d-flex justify-content-center">Nos Infos</h5>
                    </div>
                    <div class="row infofoot">
                        <ul>
                            <li>
                                <a href=""> Nous contacter</a>
                            </li>
                            <li>
                                <a href="" >Infos livraisons</a>
                            </li>
                            <li>
                                <a href="" >Infos précommandes</a>
                            </li>
                            <li>
                                <a href=""> Conditions générales de ventes</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 offset-md-2 col-lg-2  col-xl-3 mx-auto">
                    <div class="justify-content-center ">
                        <a href="http://www.twitter.com" target="_blank"  >
                            <img src="../../public/img/items/twitter.png" class="w-25" >
                        </a>
                        <a href="http://www.facebook.com" target="_blank">
                            <img src="../../public/img/items/facebook.png" class="w-25">
                        </a>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-3  col-lg-2  col-xl-3 ">
                    <h3>Newsletter </h3>
                    <p class="infofoot">Pour être tenu informé des dernières nouveautés et promos</p>
                    <form action="#" method="Post">
                        <input type="text" name="text" placeholder="Adresse email">
                        <button type="button" class="btn btn-danger">Je m'abonne</button>
                    </form>

                </div>
            </div>
        </div>


<?php
footer();

