<?php
require_once 'src/views/elements/head.php';
require_once 'src/views/elements/footer.php';
require_once 'src/config/config.php';
require_once 'src/models/connect.php';

head();
$db=connection();
$listProduit=array();
$sqlSelectProduit= 'SELECT products.id,products.name,products.price,categories.name AS nameCat 
                    FROM products
                    INNER JOIN categories ON products.category_id=categories.id';
$reqSelectProduit=$db->prepare($sqlSelectProduit);
$reqSelectProduit->execute();

While($data=$reqSelectProduit->fetchObject()){
    array_push($listProduit,$data);
}

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
                <tr>
                <td><?= $produit->id?></td>
                <td><?= $produit->name?></td>
                <td><?= $produit->price?></td>
                <td><?= $produit->nameCat?></td>




			<td>
				<a href="SRC/views/afficherProduit.php"><button class="btn btn-primary" type="submit"><i class="fa fa-bars" aria-hidden="true"></i> Lire</button></a>
				<a href="SRC/views/modifierProduit.php"><button class="btn btn-warning" type="submit"><i class="fa fa-spinner" aria-hidden="true"></i> Modifier</button></a>
				<a href="#"><button class="btn btn-danger" type="submit"><i class="fa fa-minus-square" aria-hidden="true"></i> Supprimer</button></a>
			</td>
		</tr>
		<?php
		}
            ?>

        </tbody>
    <form method="POST" action="src/views/affichage.php">
        <button type="submit" class="btn btn-outline-dark">Envoyer</button>

<?php footer();

