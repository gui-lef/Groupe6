<?php
$tableau=array("Marque" => "BMW",
    "Marque1" => "Mercedes",
    "Marque2" => "Audi",
    "Marque3" => "Jaguar",
    "Marque4" => "Aston Martin",
    "Marque5" => "Renault",
    "Marque6" => "Peugeot",
    "Marque7" => "Fiat",
);
foreach($tableau as $marque => $value){
    echo $marque." => ".$value."<br/>";
}

?>