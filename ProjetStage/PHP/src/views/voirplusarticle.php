<?php
require_once 'elements/head.php';
require_once 'elements/footer.php';
require_once '../config/config.php';
require_once '../models/connect.php';


session_start();
head();
$db = connection();

?>






<?php
footer();
