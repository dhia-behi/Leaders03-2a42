<?php
require('../../controller/evenementsController');

$actC = new evenementsController();
$actC->deleteevenements($_GET['id']);
header('Location: evenementsBack.php?idformation='.$_GET['idformation']);
?>