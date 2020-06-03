<?php
require_once 'elements/head.php';
require_once 'elements/footer.php';
require_once '../config/config.php';
require_once '../models/connect.php';


session_start();
head();
$db = connection();
//nomme mes variables
if (isset($_POST['nomArticle']) && isset($_POST['desArticle']) && isset($_POST['prixArticle'])
     && isset($_POST['qteArticle'])){
    $nomArticle = htmlspecialchars(trim($_POST['nomArticle']));
    $desArticle = htmlspecialchars(trim($_POST['desArticle']));
    $prixArticle = htmlspecialchars(trim($_POST['prixArticle']));
    $imgArticle = $_FILES['img']['name'];
    $qteArticle = htmlspecialchars(trim($_POST['qteArticle']));

    if ($_POST['typeArt']==='figurine') {

//verifie si figurine est déjà présente dans BDD
        $sqlSelectFig = "SELECT idFigurine FROM figurine
                  WHERE nomFigurine=:fig1";
        $reqSelectFig = $db->prepare($sqlSelectFig);
        $reqSelectFig->bindParam(":fig1", $nomArticle);


        $reqSelectFig->execute();
//crée le tableau pour récupérer les données
        $tableauFig = array();
        while ($data = $reqSelectFig->fetchObject()) {
            array_push($tableauFig, $data);
        }
        if (!empty($tableauFig)) {
            echo "Cette figurine existe déjà";
        } //insert des données de la fig dans la BDD
        else {
            $sqlInsertFig = "INSERT INTO figurine (nomFigurine,descriptionFigurine,prixFigurine,imageFigurine,dateAjoutFigurine,qteFigurine) 
                          VALUES (:fig1,:fig2,:fig3,:fig4,NOW(),:fig5)";
            $reqInsertFig = $db->prepare($sqlInsertFig);
            $reqInsertFig->bindParam(":fig1", $nomArticle);
            $reqInsertFig->bindParam(":fig2", $desArticle);
            $reqInsertFig->bindParam(":fig3", $prixArticle);
            $reqInsertFig->bindParam(":fig4", $imgArticle);
            $reqInsertFig->bindParam(":fig5", $qteArticle);

            $reqInsertFig->execute();
            echo "La figurine a bien été ajoutée";
             move_uploaded_file($_FILES['img']['tmp_name'],'../../public/img/articles/figurines/'.basename($_FILES['img']['name']));
        }
    }
    elseif ($_POST['typeArt']==='dvd'){

        //verifie si dvd est déjà présent dans BDD
        $sqlSelectDvd = "SELECT idDvd FROM dvdbluray
                  WHERE nomDvd=:dvd1";
        $reqSelectDvd = $db->prepare($sqlSelectDvd);
        $reqSelectDvd->bindParam(":dvd1", $nomArticle);


        $reqSelectDvd->execute();
//crée le tableau pour récupérer les données
        $tableauDvd = array();
        while ($data = $reqSelectDvd->fetchObject()) {
            array_push($tableauDvd, $data);
        }
        if (!empty($tableauDvd)) {
            echo "Ce Dvd existe déjà";
        } //insert des données du dvd dans la BDD
        else {
            $sqlInsertDvd = "INSERT INTO dvdbluray (nomDvd,descriptionDvd,prixDvd,imageDvd,dateAjoutDvd,qteDvd) 
                          VALUES (:dvd1,:dvd2,:dvd3,:dvd4,NOW(),:dvd5)";
            $reqInsertDvd = $db->prepare($sqlInsertDvd);
            $reqInsertDvd->bindParam(":dvd1", $nomArticle);
            $reqInsertDvd->bindParam(":dvd2", $desArticle);
            $reqInsertDvd->bindParam(":dvd3", $prixArticle);
            $reqInsertDvd->bindParam(":dvd4", $imgArticle);
            $reqInsertDvd->bindParam(":dvd5", $qteArticle);

            $reqInsertDvd->execute();
            echo "Le Dvd a bien été ajouté";
            move_uploaded_file($_FILES['img']['tmp_name'],'../../public/img/articles/dvd/'.basename($_FILES['img']['name']));
        }
    }

}

?>
<div class="container vh-70">
    <div class="d-flex justify-content-around mt-5">
        <h3>Ajout d'articles</h3>
    </div> <!-- enctype permet d'ajouter des images-->
        <form method="post" action="admin.php" enctype="multipart/form-data">
            <div>
                <div class="mb-1 d-flex justify-content-between">
                    <label for="typeArticle" class="label">Type d'article</label>
                    <label for="nomArticle" class="label">Nom de l'article</label>
                </div>
                <div class="mb-1 d-flex justify-content-between">
                    <select name="typeArt" class="custom-select w-45" id="inputGroupSelect01">
                        <option selected></option>
                        <option value="figurine">Figurine</option>
                        <option value="livre">Livre</option>
                        <option value="dvd">DVD & Blu-Ray</option>
                        <option value="vetement">Vétement</option>
                        <option value="goodie">Goodie</option>
                    </select>

                    <input type="text" name="nomArticle" required class="form-control w-45" id="nomArticle">
                </div>
                <div class="mb-1 d-flex justify-content-between">
                    <label for="prixArticle" class="label">Prix de l'article</label>
                    <label for="qteArticle" class="label">Quantité de l'article</label>
                </div>
                <div class="mb-1 d-flex justify-content-between">
                    <input type="text" name="prixArticle" required class="form-control w-45" id="prixArticle">
                    <input type="number" name="qteArticle" required class="form-control w-45" id="qteArticle">
                </div>
                <div class="mb-1 d-flex justify-content-between">
                    <label for="desArticle" class="label">Description de l'article</label>
                    <label for="imgArticle" class="label">Selectionner une image</label>

                </div>
                <div class="mb-1 d-flex justify-content-between">
                    <textarea name="desArticle" required class="form-control w-45" id="desArticle"></textarea>
                    <input type="file" class=" w-45" id="imgArticle" name="img">
                </div>
                <div>
                    <button type="submit" id="btnAjout" class="btn bg-bluedark text-light mt-3">Ajouter un article</button>
                </div>
            </div>
        </form>
</div>
<?php
footer();