<?php
require_once 'src/views/elements/head.php';
require_once 'src/views/elements/footer.php';
require 'src/config/config.php';
require 'src/models/connect.php';

head();
$db=Connection();

if(isset($_POST["modele"])) {
    $text = htmlspecialchars(trim($_POST["modele"]));
    $sqlInsert = "INSERT INTO modele(nommodele) VALUE(:text)";
    $req = $db->prepare($sqlInsert);
    $req->bindParam(":text", $text);
    $req->execute();
}
if(isset($_POST["marque"])) {
    $text = htmlspecialchars(trim($_POST["modele"]));
    $sqlInsert = "INSERT INTO marque(nommarque) VALUE(:text)";
    $req = $db->prepare($sqlInsert);
    $req->bindParam(":text", $text);
    $req->execute();
}


?>
    <h1>Site de mes véhicules</h1>
    <hr>
    <div>

        <a href="src/views/mesVehicules.php">
            <button type="button" class="btn btn-outline-dark">
                Mes véhicules
            </button>
        </a>

    </div>
 <?php
footer();