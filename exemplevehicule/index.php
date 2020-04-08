<?php
require_once 'src/views/elements/head.php';
require_once 'src/views/elements/footer.php';

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
    $text = htmlspecialchars(trim($_POST["marque"]));
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
        <form method="POST">

            <div class="form-group">
                <label for="modele">Modele</label>
                <input type="text" name="modele" class="form-control" id="modele">

            </div>
            <div class="form-group">
                <label for="marque">Marque</label>
                <input type="text" name="marque" id="marque" class="form-control">
    </div>
            <button type="submit" class="btn btn-outline-dark">Envoyer</button>
        </form>
 <?php
footer();