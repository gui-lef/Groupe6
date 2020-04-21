<?php
include_once 'elements/head.php';
include_once 'elements/footer.php';
require '../config/config.php';
require '../models/connect.php';



/*var_dump($db);
var_dump($_POST);*/


head();
$db=Connection();

if(isset($_POST["marque"])) {
    $marque = htmlspecialchars(trim($_POST["marque"]));
    $sqlInsertMarque = "INSERT INTO marque(nommarque) VALUE(:marque)";
    $reqMarque = $db->prepare($sqlInsertMarque);
    $reqMarque->bindParam(":marque", $marque);
    $reqMarque->execute();
    $lastIdMarque=$db->lastInsertId();
}


if(isset($_POST["modele"])) {
    $modele = htmlspecialchars(trim($_POST["modele"]));
    $sqlInsertModele = "INSERT INTO modele(nommodele) VALUE(:modele)";
    $reqModele = $db->prepare($sqlInsertModele);
    $reqModele->bindParam(":modele", $modele);
    $reqModele->execute();
    $lastIdModele=$db->lastInsertId();
}
$sqlInsertVehicule="INSERT INTO vehicule (modele_idModele,marque_idMarque) VALUE($lastIdModele,$lastIdMarque)";
$reqInsertVehicule=$db->prepare($sqlInsertVehicule);
$reqInsertVehicule->execute();

$sqlSelectVehicule="SELECT *
FROM vehicule
INNER JOIN modele ON vehicule.modele_idModele=modele.idModele
INNER JOIN marque ON vehicule.marque_idMarque=marque.idMarque";
$reqSelectVehicule=$db->prepare($sqlSelectVehicule);
$reqSelectVehicule->execute();

$listVehicules=array();

while ($data=$reqSelectVehicule->fetchObject()){
    array_push($listVehicules,$data);

}
?>

    <h1>Liste de mes véhicules</h1>
    <hr>
    <table class="table table-hover mt-5 mb-5">
        <thead class="thead-dark">
        <tr>
            <th>Marque</th>
            <th>Modèle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            foreach ($listVehicules as $vehicule){
            ?>
            <td><?= $vehicule->nomMarque?></td>
            <td><?= $vehicule->nomModele?></td>
        </tr>
        <?php
        }
        ?>

        </tbody>
    </table>
    <div>
        <a href="../../index.php">
            <button type="button" class="btn btn-outline-dark">
                Accueil
            </button>
        </a>
    </div>

<?php
footer();