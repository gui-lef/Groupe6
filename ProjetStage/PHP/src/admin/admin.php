<?php
require_once '../views/elements/head.php';
require_once '../views/elements/footer.php';
require_once '../config/config.php';
require_once '../models/connect.php';
require_once  '../../vendor/autoload.php';
        use App\Models\Figurine;
        use App\Models\Dvd;
        use App\Models\Goodie;
        use App\Models\Livre;
        use App\Models\Vetement;
        use App\Models\Utilisateur;

session_start();
head();
$db = connection();
//nomme mes variables
if (isset($_POST['nomArticle']) && isset($_POST['desArticle']) && isset($_POST['tailleVetement']) && isset($_POST['prixArticle'])
     && isset($_POST['qteArticle'])) {

    /* Figurine */
    if ($_POST['typeArt'] === 'figurine') {

//verifie si figurine est déjà présente dans BDD
        $sqlSelectFig = "SELECT id FROM figurine
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
            echo '<div class="text-center text-light bg-danger ">Cette figurine existe déjà</div>';

        } //insert des données de la fig dans la BDD
        else {
            $figurine = new Figurine($db);
            $figurine->setNomFigurine($_POST['nomArticle']);
            $figurine->setDescriptionFigurine($_POST['desArticle']);
            $figurine->setPrixFigurine($_POST['prixArticle']);
            $figurine->setImageFigurine($_FILES['img']['name']);
            $figurine->setImage2Figurine($_FILES['img2']['name']);
            $figurine->setQteFigurine($_POST['qteArticle']);
            $figurine->insert();


            echo '<div class="text-center text-light bg-success ">La figurine a bien été ajoutée</div>';
            move_uploaded_file($_FILES['img']['tmp_name'], '../../public/img/articles/figurines/' . basename($_FILES['img']['name']));
            move_uploaded_file($_FILES['img2']['tmp_name'], '../../public/img/articles/figurines/' . basename($_FILES['img2']['name']));
        }
    } /* Livre */
    elseif ($_POST['typeArt'] === 'livre') {
        $sqlSelectLivre = "SELECT idLivre FROM livre
                            WHERE nomLivre='Liv1'";
        $reqSelectLivre = $db->prepare($sqlSelectLivre);
        $reqSelectLivre->bindParam(":liv1", $nomArticle);
        $reqSelectLivre->execute();

        $tableauLivre = array();
        while ($data = $reqSelectLivre->fetchObject()) {
            array_push($tableauLivre, $data);
        }
        if (!empty($tableauLivre)) {
            echo '<div class="text-center text-light bg-danger">Ce livre existe déjà</div>';
        } else {
            $livre = new Livre($db);
            $livre->setNomLivre($_POST['nomArticle']);
            $livre->setDescriptionLivre($_POST['desArticle']);
            $livre->setPrixLivre($_POST['prixArticle']);
            $livre->setImageLivre($_FILES['img']['name']);
            $livre->setImage2Livre($_FILES['img2']['name']);
            $livre->setQteLivre($_POST['qteArticle']);

            $livre->insert();
        }

        echo '<div class="text-light text-center bg-success">Le livre a bien été ajouté</div>';
        move_uploaded_file($_FILES['img']['tmp_name'], '../../public/img/articles/livres/' . basename($_FILES['img']['name']));
        move_uploaded_file($_FILES['img2']['tmp_name'], '../../public/img/articles/livres/' . basename($_FILES['img2']['name']));

    } /* DVD */
    elseif ($_POST['typeArt'] === 'dvd') {

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
            echo '<div class="text-center text-light bg-danger ">Ce DVD existe déjà</div>';
        } //insert des données du dvd dans la BDD
        else {
            $dvd = new Dvd($db);
            $dvd->setNomDvd($_POST['nomArticle']);
            $dvd->setDescriptionDvd($_POST['desArticle']);
            $dvd->setPrixDvd($_POST['prixArticle']);
            $dvd->setImageDvd($_FILES['img']['name']);
            $dvd->setImage2Dvd($_FILES['img2']['name']);
            $dvd->setQteDvd($_POST['qteArticle']);
            $dvd->insert();

            echo '<div class="text-center text-light bg-success ">Le Dvd a bien été ajouté</div>';
            move_uploaded_file($_FILES['img']['tmp_name'], '../../public/img/articles/dvd/' . basename($_FILES['img']['name']));
            move_uploaded_file($_FILES['img2']['tmp_name'], '../../public/img/articles/dvd/' . basename($_FILES['img2']['name']));
        }
    } /*Vetement*/
    elseif ($_POST['typeArt'] === 'vetement') {
        $sqlSelectVetement = "SELECT idVetement FROM vetement
                            WHERE nomVetement=:vet1";
        $reqSelectVetement = $db->prepare($sqlSelectVetement);
        $reqSelectVetement->bindParam(":vet1", $nomArticle);
        $reqSelectVetement->execute();

        $tableauVetement = array();
        while ($data = $reqSelectVetement->fetchobject()) {
            array_push($tableauVetement, $data);
        }
        if (!empty($tableauVetement)) {
            echo '<div class="text-light text-center bg-danger" >Ce vétement existe déjà</div>';
        } else {
            $vetement=new Vetement($db);
            $vetement->setNomVetement($_POST['nomArticle']);
            $vetement->setDescriptionVetement($_POST['desArticle']);
            $vetement->setPrixVetement($_POST['prixArticle']);
            $vetement->setTailleVetement($_POST['tailleVetement']);
            $vetement->setImageVetement($_FILES['img']['name']);
            $vetement->setImage2Vetement($_FILES['img2']['name']);
            $vetement->setQteVetement($_POST['qteArticle']);
            $vetement->insert();
            }

            echo '<div class="text-light text-center bg-success">Le vétement a bien été ajouté</div>';
            move_uploaded_file($_FILES['img']['tmp_name'], '../../public/img/articles/vetements/' . basename($_FILES['img']['name']));
            move_uploaded_file($_FILES['img2']['tmp_name'], '../../public/img/articles/vetements/' . basename($_FILES['img2']['name']));
        }
     /*Goodies*/
    elseif ($_POST['typeArt'] === 'goodie') {
        $sqlSelectGoodie = "SELECT idGoodie From Goodie
                            WHERE nomGoodie=:goo1";
        $reqSelectGoodie = $db->prepare($sqlSelectGoodie);
        $reqSelectGoodie->bindParam(':goo1', $nomArticle);
        $reqSelectGoodie->execute();

        $tableauGoodie = array();
        while ($data = $reqSelectGoodie->fetchObject()) {
            array_push($tableauGoodie, $data);
        }
        if (!empty($tableauGoodie)) {
            echo '<div class="text-light text-center bg-danger">Ce goodie exite déjà</div>';
        } else {
            $goodie = new Goodie($db);
            $goodie->setNomGoodie($_POST['nomArticle']);
            $goodie->setDescriptionGoodie($_POST['desArticle']);
            $goodie->setPrixGoodie($_POST['prixArticle']);
            $goodie->setImageGoodie($_FILES['img']['name']);
            $goodie->setImage2Goodie($_FILES['img2']['name']);
            $goodie->setQteGoodie($_POST['qteArticle']);
            $goodie->insert();
        }

        echo '<div class="text-light text-center bg-success">Le goodie a bien été ajouté</div>';
        move_uploaded_file($_FILES['img']['tmp_name'], '../../public/img/articles/goodies/' . basename($_FILES['img']['name']));
        move_uploaded_file($_FILES['img2']['tmp_name'], '../../public/img/articles/goodies/' . basename($_FILES['img2']['name']));


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
                    <label for="prixArticle" class="label">Prix de l'article <small class="font-italic">(Avec un . Ex:10.5)</small></label>
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
                <div class="mb-1 d-flex justify-content-between">
                    <label for="tailleVetement" class="label">Taille du vétement</label>
                    <label for="img2Article" class="label">Selectionner une deuxieme image</label>
                </div>
                <div class="mb-1 d-flex justify-content-between">
                    <select name="tailleVetement" class="custom-select w-45" id="inputGroupSelect01">
                        <option selected></option>
                        <option value="s">Taille S</option>
                        <option value="m">Taille M</option>
                        <option value="l">Taille L</option>
                        <option value="xl">Taille XL</option>
                        <option value="xxl">Taille XXL</option>
                    </select>
                    <input type="file" class=" w-45" id="img2Article" name="img2">
                </div>
                <div>
                    <button type="submit" id="btnAjout" class="btn bg-bluedark text-light mt-3">Ajouter un article</button>
                </div>
            </div>
        </form>
</div>
<?php
footer();