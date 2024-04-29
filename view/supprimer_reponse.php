<?php 

$id = $_GET['id'];
include_once "../controller/reponseC.php";

$reponseC= new reponseC();
$reponseC->deletereponse($id); 
header('Location:afficher.php');
?>