<?php
require_once 'elements/head.php';
require_once 'elements/footer.php';
require_once '../config/config.php';
require_once '../models/connect.php';


session_start();
head();
$db = connection();
//nomme mes variables
if (isset($_POST['nomFig']) && isset($_POST['desFig']) && isset($_POST['prixFig'])
    && isset($_POST['imgFig'])&& isset($_POST['dateAjoutFig'])&& isset($_POST['qteFig'])){
    $nomFig = htmlspecialchars(trim($_POST['nom']));
    $desFig = htmlspecialchars(trim($_POST['desFig']));
    $prixFig = htmlspecialchars(trim($_POST['prixFig']));
    $imgFig = htmlspecialchars(trim($_POST['imgFig']));
    $dateAjoutFig = htmlspecialchars(trim($_POST['imgFig']));
    $qteFig = htmlspecialchars(trim($_POST['imgFig']));
//verifie si figurine est déjà présente dans BDD
    $sqlSelectFig="SELECT idFigurine FROM figurine
                  WHERE nomFigurine:=fig1
                  AND descriptionFigurine:=fig2
                  AND prixFigurine:=fig3
                  AND imageFigurine:=fig4
                  AND dateAjoutFigurine:=fig5
                  AND qteFigurine:=fig6";
    $reqSelectFig=$db->prepare($sqlSelectFig);
    $reqSelectFig->bindParam(":fig1", $nomFig);
    $reqSelectFig->bindParam(":fig2", $desFig);
    $reqSelectFig->bindParam(":fig3", $prixFig);
    $reqSelectFig->bindParam(":fig4", $imgFig);
    $reqSelectFig->bindParam(":fig5", $dateAjoutFig);
    $reqSelectFig->bindParam(":fig6", $qteFig);

    $reqSelectFig->execute();
//crée le tableau pour récupérer les données
    $tableauFig=array();
    while ($data=$reqSelectFig->fetchObject()){
        array_push($tableauFig,$data);
    }
    if (!empty($tableauFig)) {
        $idFig =intval($tableauFig[0]->idFigurine);
    }
    //insert des données de la fig dans la BDD
    else {
        $sqlInsertFig = "INSERT INTO figurine (nomFigurine,descriptionFigurine,prixFigurine,imageFigurine,dateAjoutFigurine,qteFigurine) 
                          VALUES (:fig1,:fig2,:fig3,:fig4,:fig5,:fig6)";
        $reqInsertFig=$db->prepare($sqlInsertFig);
        $reqInsertFig->bindParam(":fig1", $nomFig);
        $reqInsertFig->bindParam(":fig2", $desFig);
        $reqInsertFig->bindParam(":fig3", $prixFig);
        $reqInsertFig->bindParam(":fig4", $imgFig);
        $reqInsertFig->bindParam(":fig5", $dateAjoutFig);
        $reqInsertFig->bindParam(":fig6", $qteFig);

        $reqInsertFig->execute();
        $idFig =intval($db->lastInsertId());
    }

}
?>
<div class="d-flex justify-content-around mt-5">
    <h3>Ajout d'articles</h3>
</div>
<?php
footer();