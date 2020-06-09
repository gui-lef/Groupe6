<?php
require_once 'elements/head.php';
require_once 'elements/footer.php';
require_once '../config/config.php';
require_once '../models/connect.php';

head();
$db = connection();
                                                        //inscription//
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['tel']) && isset($_POST['adresseComplementaire']) && isset($_POST['codePostal'])
        && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['ville']) && isset($_POST['pays']) && isset($_POST['confMdp'])) {
        $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $adresse = htmlspecialchars(trim($_POST['adresse']));
        $tel = htmlspecialchars(trim($_POST['tel']));
        $adresseComplementaire = htmlspecialchars(trim($_POST['adresseComplementaire']));
        $codePostal = htmlspecialchars(trim($_POST['codePostal']));
        $email = htmlspecialchars(trim($_POST['email']));
        $confEmail = htmlspecialchars((trim($_POST['confEmail'])));
        $mdp =password_hash(htmlspecialchars(trim($_POST['mdp'])),PASSWORD_BCRYPT) ;
        $confMdp = htmlspecialchars(trim($_POST['confMdp']));
        $ville = htmlspecialchars(trim($_POST['ville']));
        $pays = htmlspecialchars(trim($_POST['pays']));

        //$sqlSelectEmail="SELECT idUtilisateur FROM utilisateur WHERE emailUti =".$email; //
        $sqlSelectEmail = "SELECT idUtilisateur FROM utilisateur WHERE emailUti =:email";
        $reqSelectEmail = $db->prepare($sqlSelectEmail);
        $reqSelectEmail->bindParam(":email", $email);

        $reqSelectEmail->execute();

        $tableauEmail = array(); //declarer tableau//
        while ($data = $reqSelectEmail->fetchObject()) {
            array_push($tableauEmail, $data);
        } //avec data recherche sur chaque ligne , fetch récupère/rapporte sous forme d'objet//

        if (!empty($tableauEmail)) {
            echo "L'adresse email est déjà utilisée";

        }
        else {
            $sqlSelectAdresse = "SELECT idAdresse FROM adresse 
                           WHERE adresse1=:ad1 
                           AND adresseComplementaire=:ad2
                           AND codePostal=:ad3
                           AND nomVille=:ad4
                           AND nomPays=:ad5";
            $reqSelectAdresse = $db->prepare($sqlSelectAdresse);
            $reqSelectAdresse->bindParam(":ad1", $adresse);
            $reqSelectAdresse->bindParam(":ad2", $adresseComplementaire);
            $reqSelectAdresse->bindParam(":ad3", $codePostal);
            $reqSelectAdresse->bindParam(":ad4", $ville);
            $reqSelectAdresse->bindParam(":ad5", $pays);

            $reqSelectAdresse->execute();


        $tableauAdresse = array();
        while ($data=$reqSelectAdresse->fetchObject()) {
            array_push($tableauAdresse, $data);
        }
        if (!empty($tableauAdresse)) {
            $idAdd =intval($tableauAdresse[0]->idAdresse);
        }
        else {
            $sqlInsertAdresse = "INSERT INTO adresse (adresse1,adressecomplementaire,codePostal,nomVille,nomPays) 
                          VALUES (:ad1,:ad2,:ad3,:ad4,:ad5)";
            $reqInsertAdresse = $db->prepare($sqlInsertAdresse);
            $reqInsertAdresse->bindParam(":ad1", $adresse);
            $reqInsertAdresse->bindParam(":ad2", $adresseComplementaire);
            $reqInsertAdresse->bindParam(":ad3", $codePostal);
            $reqInsertAdresse->bindParam(":ad4", $ville);
            $reqInsertAdresse->bindParam(":ad5", $pays);

            $reqInsertAdresse->execute();
            $idAdd =intval($db->lastInsertId());
        }


        $sqlIdUtilisateur = "SELECT idTypeUtilisateur FROM typeutilisateur WHERE nomTypeUtilisateur='Client'";
        $reqIdUtilisateur = $db->prepare($sqlIdUtilisateur);
        $reqIdUtilisateur->execute();

        $tableauId = array();
        while ($data = $reqIdUtilisateur->fetchObject()) {
            array_push($tableauId, $data);
        }
        if (!empty($tableauId)) {
            $idTypeU =intval($tableauId[0]->idTypeUtilisateur);
        }
        else {
            $sqlClient = "INSERT INTO typeutilisateur (nomTypeUtilisateur) VALUES ('Client')";
            $reqClient = $db->prepare($sqlClient);
            $reqClient->execute();
            $idTypeU =intval($db->lastInsertId()) ;
        }


            $sqlUtilisateur = "INSERT INTO utilisateur (nomUti,prenomUti,emailUti,mdpUti,telUti,typeUtilisateur_idTypeUtilisateur,adresse_idAdresse) 
                               VALUES (:uti1,:uti2,:uti3,:uti4,:uti5,:uti6,:uti7)";
            $reqUtilisateur = $db->prepare($sqlUtilisateur);
            $reqUtilisateur->bindParam(":uti1",$nom);
            $reqUtilisateur->bindParam(":uti2",$prenom);
            $reqUtilisateur->bindParam(":uti3",$email);
            $reqUtilisateur->bindParam(":uti4",$mdp);
            $reqUtilisateur->bindParam(":uti5",$tel);
            $reqUtilisateur->bindParam(":uti6",$idTypeU);
            $reqUtilisateur->bindParam(":uti7",$idAdd);

            $reqUtilisateur->execute();
            echo '<div class="text-center text-light bg-success">enregistrement bien effectué</div>';
        }
    }
                                                        //Connexion//
    if (isset($_POST['emailConnex']) && (isset($_POST['mdpConnex']))){
        $emailConnex = htmlspecialchars(trim($_POST['emailConnex']));
        $mdpConnex =htmlspecialchars(trim($_POST['mdpConnex'])) ;

        $sqlSelectEmailCo = "SELECT idUtilisateur,mdpUti,prenomUti FROM utilisateur WHERE emailUti =:emailConnex";
        $reqSelectEmailCo = $db->prepare($sqlSelectEmailCo);
        $reqSelectEmailCo->bindParam(":emailConnex", $emailConnex);

        $reqSelectEmailCo->execute();

        $tableauEmailCo=array();
        while ($data=$reqSelectEmailCo->fetchObject()) {
            array_push($tableauEmailCo,$data);
            }
         if (empty ($tableauEmailCo)){
             echo'<div class="text-center text-light bg-danger">Email inexistant,veuillez creer un compte.</div>';
            }
         else {
             $verifOK=password_verify($mdpConnex,$tableauEmailCo[0]->mdpUti);
         }
         if (!$verifOK){
             echo'<div class="text-center text-light bg-danger">Email ou mot de passe incorrect.</div>';
         }
         else{
             session_start();

             $_SESSION['prenom']=$tableauEmailCo[0]->prenomUti;
             $_SESSION['idUtilisateur']=$tableauEmailCo[0]->idUtilisateur;
             header('location:../../index.php');

         }


        }









?>
    <div ><h4 class="d-flex justify-content-center mt-3">IDENTIFIEZ-VOUS</h4> <hr style="width:80%;background-color:#333F50;border-width: 1px">
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">
            <div class="card">
                <div class="card-body" style="border:1px solid #333F50;">
                    <h5 class="card-title">CREEZ VOTRE COMPTE</h5> <hr style="background-color:#333F50;border-width: 1px">
                           <form method="post" action="inscription.php">

                                                                    <!-- Prenom et Nom -->

                                <div class=" mb-2 d-flex justify-content-between ">
                                    <label for="validationCustom01"class="label">Prénom</label>
                                    <label for="validationCustom01" class="label">Nom</label>

                                </div>

                               <div class=" mb-2 d-flex justify-content-between">
                                   <input type="text" class="form-control w-45" name="prenom" id="prenom" placeholder="" required>
                                    <input type="text" class="form-control w-45" name="nom" id="nom" placeholder="" required>

                                </div>

                                                                    <!--Adresse et adresse complementaire-->

                                <div class=" mb-2 d-flex justify-content-between"
                                    <label for="adresse" class="label">Adresse</label>
                                    <label for="adresseComplementaire" class="label">Adresse complèmentaire</label>
                                </div>

                                <div class=" mb-2 d-flex justify-content-between">
                                    <input type="text" class="form-control w-45" name="adresse" id="adresse" placeholder=""  required>
                                    <input type="text" class="form-control w-45" name="adresseComplementaire" id="adresseComplementaire" placeholder=""  required>
                                </div>

                                                                     <!--Code postal et ville-->

                                <div class=" mb-2  d-flex justify-content-between">
                                    <label for="codePostal" class="label">Code postal</label>
                                    <label for="ville" class="label">Ville</label>
                                </div>

                                <div class=" mb-2  d-flex justify-content-between ">
                                    <input type="text" class="form-control w-25  label" id="codePostal" name="codePostal" placeholder="" required>
                                    <input type="text" class="form-control w-45  label" id="ville" name="ville" placeholder="" required>
                                </div>

                                                                    <!--Tel et pays-->


                                <div class="mb-2 d-flex justify-content-between">
                                    <label for="tel"class="label">Téléphone </label>
                                    <label for="pays"class="label">Pays </label>
                                </div>

                                <div class=" mb-2  d-flex justify-content-between ">

                                    <input type="number" class="form-control w-45" name="tel" id="tel" placeholder="">
                                    <input type="text" class="form-control w-45" name="pays" id="pays"  placeholder="">
                                </div>

                                                                <!--Email et confirmation email-->


                                <div class="mb-2 d-flex justify-content-between">
                                    <label for="email"class="label">Adresse email </label>
                                    <label for="confEmail"class="label">Confirmation de l'email </label>
                                </div>

                                <div class=" mb-2  d-flex justify-content-between ">

                                    <input type="email" class="form-control w-45" name="email" id="email" aria-describedby="emailHelp" placeholder="">
                                    <input type="email" class="form-control w-45" name="confEmail" id="confEmail"  placeholder="">
                                </div>

                                                                    <!--Mot de passe et confirmation mot de passe-->

                                <div class=" mb-2 d-flex justify-content-between">
                                    <label for="mdp" class="label">Mot de passe </label>
                                    <label for="confMdp"class="label">Confirmation le mot de passe </label>
                                </div>

                                <div class= "mb-2 d-flex justify-content-between">
                                    <input type="password" id="mdp" name="mdp" class="form-control w-45" aria-describedby="passwordHelpBlock">
                                    <input type="password" id="confMdp" name="confMdp" class="form-control w-45" aria-describedby="passwordHelpBlock">
                                </div>
                                <div class="mb-3">
                                    <small >Au moins une majuscule et 6 caractères</small>
                                </div>
                                <button type="submit" id="btnInscription" class="btn bg-bluedark text-light mt-3">Creez votre compte</button>
                        </form>
                    </div>
                </div>
            </div>
                                                                    <!-- Connexion-->
            <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">
                <div class="card">
                    <div class="card-body" style="border:1px solid #333F50;">
                        <h5 class="card-title">DEJA INSCRIT ?</h5><hr style="background-color:#333F50;border-width: 1px">
                            <form method="post" action="inscription.php">
                                <div class="form-group">
                                    <br/>
                                    <label for="emailConnex">Adresse email </label>
                                    <input type="email" class="form-control " id="email" name="emailConnex" aria-describedby="emailHelp" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="mdpConnex">Mot de passe</label>
                                    <input type="password" class="form-control " id="mdp" name="mdpConnex" placeholder="">
                                    <small id="emailHelp" class="form-text text-muted"><a href="#">Mot de passe oublié ?</a></small>
                                </div>
                                <button type="submit" class="btn bg-bluedark text-light">Connexion</button>
                            </form>
                        </div>
                  </div>
             </div>
    </div>


<?php
footer();
