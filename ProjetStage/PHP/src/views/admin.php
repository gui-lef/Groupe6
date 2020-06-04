<?php
require_once 'elements/head.php';
require_once 'elements/footer.php';
require_once '../config/config.php';
require_once '../models/connect.php';


session_start();
head();
$db = connection();
//nomme mes variables
if (isset($_POST['nomArticle']) && isset($_POST['desArticle']) && isset($_POST['tailleVetement']) && isset($_POST['prixArticle'])
     && isset($_POST['qteArticle'])){
    $nomArticle = htmlspecialchars(trim($_POST['nomArticle']));
    $desArticle = htmlspecialchars(trim($_POST['desArticle']));
    $prixArticle = htmlspecialchars(trim($_POST['prixArticle']));
    $imgArticle = $_FILES['img']['name'];
    $img2Article = $_FILES['img2']['name'];
    $qteArticle = htmlspecialchars(trim($_POST['qteArticle']));
    $tailleVetement=htmlspecialchars(trim($_POST['tailleVetement']));
                                                                        /* Figurine */
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
            echo'<div class="text-center text-light bg-danger ">Cette figurine existe déjà</div>';

        } //insert des données de la fig dans la BDD
        else {
            $sqlInsertFig = "INSERT INTO figurine (nomFigurine,descriptionFigurine,prixFigurine,imageFigurine,image2Figurine,dateAjoutFigurine,qteFigurine) 
                          VALUES (:fig1,:fig2,:fig3,:fig4,:fig5,NOW(),:fig6)";
            $reqInsertFig = $db->prepare($sqlInsertFig);
            $reqInsertFig->bindParam(":fig1", $nomArticle);
            $reqInsertFig->bindParam(":fig2", $desArticle);
            $reqInsertFig->bindParam(":fig3", $prixArticle);
            $reqInsertFig->bindParam(":fig4", $imgArticle);
            $reqInsertFig->bindParam(":fig5", $img2Article);
            $reqInsertFig->bindParam(":fig6", $qteArticle);

            $reqInsertFig->execute();
            echo'<div class="text-center text-light bg-success ">La figurine a bien été ajoutée</div>';
             move_uploaded_file($_FILES['img']['tmp_name'],'../../public/img/articles/figurines/'.basename($_FILES['img']['name']));
             move_uploaded_file($_FILES['img2']['tmp_name'],'../../public/img/articles/figurines/'.basename($_FILES['img2']['name']));
        }
    }

                                                                                /* Livre */
    elseif ($_POST['typeArt']==='livre'){
        $sqlSelectLivre= "SELECT idLivre FROM livre
                            WHERE nomLivre='Liv1'";
        $reqSelectLivre=$db->prepare($sqlSelectLivre);
        $reqSelectLivre->bindParam(":liv1",$nomArticle);
        $reqSelectLivre->execute();

        $tableauLivre=array();
        while ($data=$reqSelectLivre->fetchObject()){
            array_push($tableauLivre,$data);
        }
        if (!empty($tableauLivre)){
            echo '<div class="text-center text-light bg-danger">Ce livre existe déjà</div>';
        }
        else{
            $sqlInsertLivre ="INSERT INTO livre (nomLivre,descriptionLivre,prixLivre,imageLivre,image2Livre,dateAjoutLivre,qteLivre)
                              VALUES (:liv1,:liv2,:liv3,:liv4,:liv5,NOW(),:liv6)";
            $reqInsertLivre =$db->prepare($sqlInsertLivre);
            $reqInsertLivre->bindParam(":liv1",$nomArticle);
            $reqInsertLivre->bindParam(":liv2",$desArticle);
            $reqInsertLivre->bindParam(":liv3",$prixArticle);
            $reqInsertLivre->bindParam(":liv4",$imgArticle);
            $reqInsertLivre->bindParam(":liv5",$img2Article);
            $reqInsertLivre->bindParam(":liv6",$qteArticle);
            $reqInsertLivre->execute();
            echo '<div class="text-light text-center bg-success">Le livre a bien été ajouté</div>';
            move_uploaded_file($_FILES['img']['tmp_name'],'../../public/img/articles/livres/'.basename($_FILES['img']['name']));
            move_uploaded_file($_FILES['img2']['tmp_name'],'../../public/img/articles/livres/'.basename($_FILES['img2']['name']));
        }
    }

                                                                            /* DVD */
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
            echo'<div class="text-center text-light bg-danger ">Ce DVD existe déjà</div>';
        } //insert des données du dvd dans la BDD
        else {
            $sqlInsertDvd = "INSERT INTO dvdbluray (nomDvd,descriptionDvd,prixDvd,imageDvd,image2Dvd,dateAjoutDvd,qteDvd) 
                          VALUES (:dvd1,:dvd2,:dvd3,:dvd4,:dvd5,NOW(),:dvd6)";
            $reqInsertDvd = $db->prepare($sqlInsertDvd);
            $reqInsertDvd->bindParam(":dvd1", $nomArticle);
            $reqInsertDvd->bindParam(":dvd2", $desArticle);
            $reqInsertDvd->bindParam(":dvd3", $prixArticle);
            $reqInsertDvd->bindParam(":dvd4", $imgArticle);
            $reqInsertDvd->bindParam(":dvd5", $img2Article);
            $reqInsertDvd->bindParam(":dvd6", $qteArticle);

            $reqInsertDvd->execute();
            echo'<div class="text-center text-light bg-success ">Le Dvd a bien été ajouté</div>';
            move_uploaded_file($_FILES['img']['tmp_name'],'../../public/img/articles/dvd/'.basename($_FILES['img']['name']));
            move_uploaded_file($_FILES['img2']['tmp_name'],'../../public/img/articles/dvd/'.basename($_FILES['img2']['name']));
        }
    }

                                                                                        /*Vetement*/
    elseif ($_POST['typeArt']==='vetement'){
        $sqlSelectVetement="SELECT idVetement FROM vetement
                            WHERE nomVetement=:vet1";
        $reqSelectVetement=$db->prepare($sqlSelectVetement);
        $reqSelectVetement->bindParam(":vet1",$nomArticle);
        $reqSelectVetement->execute();

        $tableauVetement=array();
        while ($data=$reqSelectVetement->fetchobject()){
            array_push($tableauVetement,$data);
        }
        if (!empty($tableauVetement)){
            echo'<div class="text-light text-center bg-danger" >Ce vétement existe déjà</div>';
        }
        else{
            $sqlInsertVetement = "INSERT INTO vetement (nomVetement,descriptionVetement,prixVetement,tailleVetement,
                                        imageVetement,image2Vetement,dateAjoutVetement,qteVetement)
                                        VALUES (:vet1,:vet2,:vet3,:vet4,:vet5,:vet6,NOW(),:vet7)";
            $reqInsertVetement=$db->prepare($sqlInsertVetement);
            $reqInsertVetement->bindParam(":vet1",$nomArticle);
            $reqInsertVetement->bindParam(":vet2",$desArticle);
            $reqInsertVetement->bindParam(":vet3",$prixArticle);
            $reqInsertVetement->bindParam(":vet4",$tailleVetement);
            $reqInsertVetement->bindParam(":vet5",$imgArticle);
            $reqInsertVetement->bindParam(":vet6",$img2Article);
            $reqInsertVetement->bindParam(":vet7",$qteArticle);

            $reqInsertVetement->execute();
            echo '<div class="text-light text-center bg-success">Le vétement a bien été ajouté</div>';
            move_uploaded_file($_FILES['img']['tmp_name'],'../../public/img/articles/vetements/'.basename($_FILES['img']['name']));
            move_uploaded_file($_FILES['img2']['tmp_name'],'../../public/img/articles/vetements/'.basename($_FILES['img2']['name']));
        }
    }
                                                                                            /*Goodies*/
        elseif ($_POST['typeArt']==='goodie'){
        $sqlSelectGoodie ="SELECT idGoodie From Goodie
                            WHERE nomGoodie=:goo1";
        $reqSelectGoodie=$db->prepare($sqlSelectGoodie);
        $reqSelectGoodie->bindParam(':goo1',$nomArticle);
        $reqSelectGoodie->execute();

        $tableauGoodie=array();
        while ($data=$reqSelectGoodie->fetchObject()){
            array_push($tableauGoodie,$data);
            }
        if(!empty($tableauGoodie)){
            echo '<div class="text-light text-center bg-danger">Ce goodie exite déjà</div>';
        }
        else{
            $sqlInsertGoodie = "INSERT INTO goodie (nomGoodie,descriptionGoodie,PrixGoodie,imageGoodie,image2Goodie,dateAjoutGoodie,qteGoodie)
                                VALUES (:goo1,:goo2,:goo3,:goo4,:goo5,NOW(),:goo6)";
            $reqInsertGoodie =$db->prepare($sqlInsertGoodie);
            $reqInsertGoodie->bindParam(":goo1",$nomArticle);
            $reqInsertGoodie->bindParam(":goo2",$desArticle);
            $reqInsertGoodie->bindParam(":goo3",$prixArticle);
            $reqInsertGoodie->bindParam(":goo4",$imgArticle);
            $reqInsertGoodie->bindParam(":goo5",$img2Article);
            $reqInsertGoodie->bindParam(":goo6",$qteArticle);

            $reqInsertGoodie->execute();
            echo '<div class="text-light text-center bg-success">Le goodie a bien été ajouté</div>';
            move_uploaded_file($_FILES['img']['tmp_name'],'../../public/img/articles/goodies/'.basename($_FILES['img']['name']));
            move_uploaded_file($_FILES['img2']['tmp_name'],'../../public/img/articles/goodies/'.basename($_FILES['img2']['name']));
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