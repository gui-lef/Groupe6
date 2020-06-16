<?php

require_once '../../../vendor/autoload.php';
//require_once '../../models/figurine.php';
require_once '../../config/config.php';
require_once '../../models/connect.php';

use App\Models\Figurine;
$db = connection();

var_dump($_POST);
if (isset($_POST['id'])){

    $figurine = new Figurine($db);

    $figurine->setId($_POST["id"]);
    $myfigurine=$figurine->select();
    var_dump($myfigurine);





}