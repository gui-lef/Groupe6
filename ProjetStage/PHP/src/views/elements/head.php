<?php
function head(){


    ?>
<!DOCTYPE html>
<html lang="fr" xmlns:font-color="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../../public/css/index.css">

    <title>Les trésors de One Piece</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-bluedark p-2">
    <div class="d-flex align-item-center navigation">
        <div class="titrebanniere "><a class="text-light" href="../../../index.php "> LES TRESORS DE ONE PIECE</a></div>
        <div class="d-flex" id="image">
            <ul >
                <li>
                    <?php
                        if(isset($_SESSION['prenom']))
                        {
                    ?>
                            <span class="text-light">Bonjour <a href="../../../src/views/compte.php" ><?= $_SESSION['prenom']  ?></a></span>
                    <?php } ?>
                    <?php
                    if(isset($_SESSION['prenom']))
                        {
                    ?>
                    <a href="../../../src/views/deconnexion.php">
                        <img title="Deconnexion" src="../../../public/img/items/icone_deco_blanc.png"
                    </a>

                        <?php
                        }

                    if(!isset($_SESSION['prenom']))
                    {
                    ?>
                    <a href="../../../src/views/inscription.php">
                        <img class="Inscription/Connexion" src="../../../public/img/items/user1.png" >
                    </a>
                    <?php } ?>

                    <a href="../../../src/views/panier.php">
                        <img title="Panier" class="panier " src="../../../public/img/items/cart_Blanc.png" >
                    </a>

                </li>
            </ul>

        </div>
    </div>


    <span class="navbar-brand"></span>
    <button id="icone" class="navbar-toggler" type="button"  data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">

        <ul class="navbar-nav m-md-3 m-ms-3">

            <li class="nav-item active">
                <a class="nav-link " href="../../../index.php" id="Accueil">ACCUEIL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../../src/views/figurines.php" id="figurines">FIGURINES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../../src/views/livres.php" id="livres">LIVRES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../../src/views/dvd.php" id="dvd">DVD & BLU-RAY</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../../src/views/vetements.php" id="vetements">VETEMENTS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../../src/views/goodies.php" id="goodies">GOODIES</a>
            </li>
        </ul>
    </div>
</nav>

    <?php
} ?>
