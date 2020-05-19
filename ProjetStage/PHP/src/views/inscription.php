<?php
require_once 'elements/head.php';
require_once 'elements/footer.php';
require_once '../config/config.php';
require_once '../models/connect.php';

head();
$db = connection();

?>
    <div ><h4 class="d-flex justify-content-center mt-3">IDENTIFIEZ-VOUS</h4>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">CREEZ VOTRE COMPTE</h5>
                    <form>
                        <div class="form-group">
                            <small id="emailHelp" class="form-text text-muted">Veuillez saisir votre adresse email pour créer un compte.</small><br/>
                            <label for="exampleInputEmail1">Adresse email </label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <button type="submit" class="btn bg-bluedark text-light">Creez votre compte</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-4  col-lg-4  col-xl-4 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">DEJA INSCRIT ?</h5>
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
<?php
footer();
