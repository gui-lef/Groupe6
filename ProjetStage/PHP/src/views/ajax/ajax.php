<?php

require_once '../../../vendor/autoload.php';
require_once '../../views/ajax/ajax.php';
require_once '../../config/config.php';
require_once '../../models/connect.php';

use App\Models\Figurine;
use App\Models\Livre;
use App\Models\Dvd;
use App\Models\Vetement;
use App\Models\Goodie;

$db = connection();

if (isset($_POST['id'])){

    if ($_POST['type'] =='livres'){

        $livre = new Livre($db);

        $livre->setId($_POST["id"]);
        $mylivre=$livre->select();

        echo json_encode($mylivre);



    }
    elseif ($_POST['type']=='figurines') {
        $figurine = new Figurine($db);

        $figurine->setId($_POST["id"]);
        $myfigurine = $figurine->select();

        echo json_encode($myfigurine);
    }

    if ($_POST['type']=='dvd') {
        $dvd = new Dvd($db);

        $dvd->setId($_POST["id"]);
        $mydvd = $dvd->select();

        echo json_encode($mydvd);
    }

    if ($_POST['type']=='vetements') {
        $vetement = new Vetement($db);

        $vetement->setId($_POST["id"]);
        $myvetement = $vetement->select();

        echo json_encode($myvetement);
    }

    if ($_POST['type']=='goodies') {
        $goodie = new Goodie($db);

        $goodie->setId($_POST["id"]);
        $mygoodie = $goodie->select();

        echo json_encode($mygoodie);
    }
}