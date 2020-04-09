<?php
require_once 'src/views/elements/head.php';
require_once 'src/views/elements/footer.php';
require_once 'src/config/config.php';
require_once 'src/models/connect.php';

head();
$db=connection();
$listProduit=array();
?>

	<h2>Products</h2>

	<table class="table table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Description</th>
			<th scope="col">Price</th>
			<th scope="col">Category</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
            <?php
            foreach ($listProduit as $produit){
                ?>
                <td><?= $produit->idProduit?></td>
                <td><?= $produit->nomProduit?></td>
                <td><?= $produit->prixProduit?></td>
                </tr>
                <?php
            }
            ?>
			<td>
				<a href="#"><button class="btn btn-primary" type="submit"><i class="fa fa-bars" aria-hidden="true"></i> Lire</button></a>
				<a href="#"><button class="btn btn-warning" type="submit"><i class="fa fa-spinner" aria-hidden="true"></i> Modifier</button></a>
				<a href="#"><button class="btn btn-danger" type="submit"><i class="fa fa-minus-square" aria-hidden="true"></i> Supprimer</button></a>
			</td>
		</tr>

    <form method="POST" action="src/views/affichage.php">
        <button type="submit" class="btn btn-outline-dark">Envoyer</button>

<?php footer();

