<?php
require_once 'src/views/elements/head.php';
require_once 'src/views/elements/footer.php';


head();



?>
    <h1>Site de mes véhicules</h1>
    <hr>
    <div>



        <form method="POST" action="src/views/mesVehicules.php">
            <div class="form-group">
                <label for="marque">Marque</label>
                <input type="text" name="marque" id="marque" class="form-control">
            </div>

            <div class="form-group">
                <label for="modele">Modele</label>
                <input type="text" name="modele" class="form-control" id="modele">
            </div>
            <button type="submit" class="btn btn-outline-dark">Envoyer</button>
        </form>

 <?php
footer();