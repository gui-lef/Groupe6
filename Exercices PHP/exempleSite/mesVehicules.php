<?php
    $tableau=array("Marque" => "BMW",
        "Mercedes" => "Benz",
        "Audi" => "R8",
        "Jaguar" => "Type-E",
        "Aston Martin" => "BD7",
        "Renault" => "Clio",
        "Peugeot" => "206",
        "Fiat" => "Panda",
    );


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<table>
    <tr>
        <th>Marque</th>
        <th>Modèle</th>
    </tr>
    <?php
    foreach($tableau as $marque => $modele){
        echo $marque." => ".$modele."<br/>";

    ?>
    <tr>
        <td><?=$marque;?></td>
        <td><?=$modele;?></td>
    </tr>
    }
</table>

</body>
</html>
