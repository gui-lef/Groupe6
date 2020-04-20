<?php

$prenom="guillaume";
$nom="lefebvre";
$age=23;
echo $prenom;
echo "<br>";
echo $nom." ".$prenom." ";?>
<p>mon nom est <?php echo $nom ?> et mon prénom est <?php echo $prenom ?> </p>
<?php

$ageplus10ans=$age+10;
echo $ageplus10ans;

$ageplus=5;
$ageplusu= 0;
function agePlus($age){
    for($i=0;$i<$age;$i++){
        echo $i++;
    }
}
//agePlus($ageplus);

define("AGE",50);
echo AGE;



echo $ageplusu;
