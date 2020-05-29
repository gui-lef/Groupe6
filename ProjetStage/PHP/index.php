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
    <div class="container">
        <h3 class="h3">Articles Populaires</h3>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="product-grid h-100 bg-white">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1" src="public/img/articles/figurines/zoro.jpeg">
                            <img class="pic-2" src="public/img/articles/figurines/zoro1.jpeg">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Voir +"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Ajouter au panier"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>

                    </div>

                    <div class="product-content">
                        <h3 class="title"><a href="#">Figurine Roronoa Zoro – Grandista Manga Dimension– 28 cm</a></h3>
                        <div class="price">74,90€

                        </div>
                        <button type="button" class="btn btn-outline-danger href=">Ajouter au panier</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="product-grid h-100 bg-white">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1 " src="public/img/articles/livres/tome96_.jpg">
                            <img class="pic-2" src="public/img/articles/livres/tome96.png">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Voir +"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Ajouter au panier"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>

                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Manga One Piece - Tome 96 - Edition originale</a></h3>
                        <div class="price">6,90€

                        </div>
                        <button type="button" class="btn btn-outline-danger href=">Ajouter au panier</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="product-grid h-100 bg-white">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1" src="public/img/articles/vetements/sweat_law.jpg">
                            <img class="pic-2" src="public/img/articles/vetements/sweat_law2.jpg">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Voir +"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Ajouter au panier"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>

                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Figurine Roronoa Zoro – Grandista Manga Dimension– 28 cm</a></h3>
                        <div class="price">44,90€

                        </div>
                        <button type="button" class="btn btn-outline-danger href=">Ajouter au panier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--2eme ligne d'articles-->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="product-grid h-100 bg-white">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1" src="public/img/articles/dvd/stampede.jpg">
                            <img class="pic-2" src="public/img/articles/dvd/stampede2.jpg">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Voir +"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Ajouter au panier"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>

                    </div>

                    <div class="product-content">
                        <h3 class="title"><a href="#">One Piece : Stampede-Edition Combo Collector BR/DVD [Boitier métal] [Blu-Ray]</a></h3>
                        <div class="price">29,90€

                        </div>
                        <button type="button" class="btn btn-outline-danger href=">Ajouter au panier</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="product-grid h-100 bg-white">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1 " src="public/img/articles/goodies/pc_chopper1.jpg">
                            <img class="pic-2" src="public/img/articles/goodies/pc_chopper2.jpg">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Voir +"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Ajouter au panier"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>

                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Porte clés Chopper </a></h3>
                        <div class="price">4,90€

                        </div>
                        <button type="button" class="btn btn-outline-danger href=">Ajouter au panier</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="product-grid h-100 bg-white">
                    <div class="product-image">
                        <a href="#">
                            <img class="pic-1" src="public/img/articles/figurines/luffy.jpg">
                            <img class="pic-2" src="public/img/articles/figurines/luffy2.jpg">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="Voir +"><i class="fa fa-search"></i></a></li>
                            <li><a href="" data-tip="Ajouter au panier"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>

                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Figurine Monkey D Luffy Grandista Manga Dimensions</a></h3>
                        <div class="price">64,90€

                        </div>
                        <button type="button" class="btn btn-outline-danger href=">Ajouter au panier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
footer();
