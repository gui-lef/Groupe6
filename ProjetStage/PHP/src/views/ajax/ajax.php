<?php

require_once '../../../vendor/autoload.php';
//require_once '../../models/figurine.php';
require_once '../../config/config.php';
require_once '../../models/connect.php';

use App\Models\Figurine;
use App\Models\Livre;
$db = connection();


if (isset($_POST['id'])){

    if ($_POST['type'] =='livre'){

        $livre = new Livre($db);

        $livre->setId($_POST["id"]);
        $mylivre=$livre->select();

        echo json_encode($mylivre);



    }
    elseif ($_POST['figurine']=='figurine') {
        $figurine = new Figurine($db);

        $figurine->setId($_POST["id"]);
        $myfigurine = $figurine->select();

        echo json_encode($myfigurine);


    }

}