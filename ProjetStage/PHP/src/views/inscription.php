<?php
require_once 'elements/head.php';
require_once 'elements/footer.php';
require_once '../config/config.php';
require_once '../models/connect.php';

head();
$db = connection();

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['adresseComplementaire']) && isset($_POST['codePostal']) && isset($_POST['ville'])
                && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['confMdp'])){
    $nom=htmlspecialchars(trim($_POST['nom']));
    $prenom=htmlspecialchars(trim($_POST['prenom']));
    $adresse=htmlspecialchars(trim($_POST['adresse']));
    $adresseComplementaire=htmlspecialchars(trim($_POST['adresseComplementaire']));
    $codePostal=htmlspecialchars(trim($_POST['codePostal']));
    $email=htmlspecialchars(trim($_POST['email']));
    $mdp=htmlspecialchars(trim($_POST['mdp']));
    $confMdp=htmlspecialchars(trim($_POST['confMdp']));
                            };


?>
    <div ><h4 class="d-flex justify-content-center mt-3">IDENTIFIEZ-VOUS</h4> <hr style="width:80%;background-color:#333F50;border-width: 1px">
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">
            <div class="card">
                <div class="card-body" style="border:1px solid #333F50;">
                    <h5 class="card-title">CREEZ VOTRE COMPTE</h5> <hr style="background-color:#333F50;border-width: 1px">
                           <form method="post" action="inscription.php">
                                                                        <!--Nom et prenom-->

                                    <div class=" mb-2 d-flex justify-content-between ">
                                        <label for="validationCustom01" class="label">Nom</label>
                                        <label for="validationCustom01"class="label">Prénom</label>
                                    </div>



                                <div class=" mb-2 d-flex justify-content-between">
                                    <input type="text" class="form-control w-45" name="nom" id="nom" placeholder="" required>
                                    <input type="text" class="form-control w-45" name="prenom" id="prenom" placeholder="" required>
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
                                                                        <!--Email et pays-->
                            <div class="mb-2 d-flex justify-content-between">
                                <label for="email"class="label">Adresse email </label>
                                <label for="pays"class="label">Pays </label>
                            </div>
                            <div class=" mb-2  d-flex justify-content-between ">

                                <input type="email" class="form-control w-45" name="email" id="email" aria-describedby="emailHelp" placeholder="">
                                <input type="text" class="form-control w-45" name="pays" id="pays"  placeholder="">
                            </div>
                <!--Mot de passe-->
                <div class=" mb-2 d-flex justify-content-between">
                    <label for="mdp" class="label">Mot de passe </label>
                    <label for="confMdp"class="label">Confirmer le mot de passe </label>
                </div>

                <div class= "mb-2 d-flex justify-content-between">
                    <input type="password" id="inputPassword5" name="confMdp" class="form-control w-45" aria-describedby="passwordHelpBlock">
                    <input type="password" id="inputPassword5" name="mdp" class="form-control w-45" aria-describedby="passwordHelpBlock">
                </div>
                <div class="mb-3">


                    <small >Au moins une Majuscule et 9 caractères</small>
                </div>



                    <button type="submit" class="btn bg-bluedark text-light mt-3">Creez votre compte</button>
                        </form>
                    </div>
                </div>
            </div>



        <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">
            <div class="card">
                <div class="card-body" style="border:1px solid #333F50;">
                    <h5 class="card-title">DEJA INSCRIT ?</h5><hr style="background-color:#333F50;border-width: 1px">
                    <form>
                        <div class="form-group">
                            <br/>
                            <label for="exampleInputEmail1">Adresse email </label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
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
