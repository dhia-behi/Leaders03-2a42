<?php
require('../../controller/FormationController');

$actC = new FormationController();
$actC->deleteFormation($_GET['id']);
header('Location: FormationBack.php');
?>