<?php
require_once 'elements/head.php';
require_once 'elements/footer.php';
require_once '../config/config.php';
require_once '../models/connect.php';

head();
$db = connection();

?>
    <div ><h4 class="d-flex justify-content-center mt-3">IDENTIFIEZ-VOUS</h4> <hr style="width:80%;background-color:#333F50;border-width: 1px">
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">
            <div class="card">
                <div class="card-body" style="border:1px solid #333F50;">
                    <h5 class="card-title">CREEZ VOTRE COMPTE</h5> <hr style="background-color:#333F50;border-width: 1px">
                                                                        <!--Nom-->

                                    <div class="col-md-4 mb-1">
                                        <label for="validationCustom01">Nom</label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="" value="" required>
                                    </div>

                                                                        <!--Prénom-->

                                <div class="col-md-4 mb-1">
                                    <label for="validationCustom01">Prénom</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="" value="" required>
                                </div>

                                                                        <!--Adresse-->
                                <div class="col-md-8 mb-1"
                                    <label for="validationCustom01">Adresse</label>
                                    <input type="text" class="form-control " id="validationCustom01" placeholder="" value="" required>
                                </div>

                                                                         <!--Code postal-->
                                <div class="col-md-4 mb-1">
                                    <label for="validationCustom01">code postal</label>
                                    <input type="number" class="form-control " id="validationCustom01" placeholder="" value="" required>
                                </div>

                                                                        <!--Ville-->
                            <div class="col-md-4 mb-1">
                                <label for="validationCustom01">Ville</label>
                                <input type="text" class="form-control " id="validationCustom01" placeholder="" value="" required>
                            </div>
                                                                        <!--Email-->
                            <div class="col-md-8 mb-1">
                                <label for="validationCustom01">Adresse email </label>
                                <input type="email" class="form-control " id="validationCustom01" aria-describedby="emailHelp" placeholder="">
                            </div>
                                                                        <!--Mot de passe-->
                            <div class="col-md-6 mb-1">
                                <label for="inputPassword5">Mot de passe </label>
                                <input type="password" id="inputPassword5" class="form-control " aria-describedby="passwordHelpBlock">
                            </div>

                            <div class="col-md-6 mb-1">
                                <label for="inputPassword5">Comfirmer le mot de passe </label>
                                <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                            </div>


                    <button type="submit" class="btn bg-bluedark text-light mt-3">Creez votre compte</button>

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
