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
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="product-grid h-100 bg-white">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1" src="../../public/img/articles/vetements/sweat_law.jpg">
                            <img class="pic-2" src="../../public/img/articles/vetements/sweat_law2.jpg">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Voir +"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Ajouter au panier"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>

                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Sweat Trafalgar Law - Noir </a></h3>
                        <div class="price">24,90€

                        </div>
                        <button type="button" class="btn btn-outline-danger href=">Ajouter au panier</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="product-grid h-100 bg-white">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1" src="../../public/img/articles/vetements/casquette_chopper.jpg">
                            <img class="pic-2" src="../../public/img/articles/vetements/casquette_chopper2.jpg">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Voir +"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Ajouter au panier"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>

                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Casquette Chopper</a></h3>
                        <div class="price">14,90€

                        </div>
                        <button type="button" class="btn btn-outline-danger href=">Ajouter au panier</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="product-grid h-100 bg-white">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1" src="../../public/img/articles/vetements/sweat_law.jpg">
                            <img class="pic-2" src="../../public/img/articles/vetements/sweat_law2.jpg">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Voir +"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Ajouter au panier"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>

                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Sweat Trafalgar Law - Noir </a></h3>
                        <div class="price">29,90€

                        </div>
                        <button type="button" class="btn btn-outline-danger href=">Ajouter au panier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
footer();


