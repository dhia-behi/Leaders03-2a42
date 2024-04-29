<?php 

$id = $_GET['id'];
include_once "../controller/reclamationC.php";

$reclamationC= new reclamationC();
$reclamationC->deletereclamation($id); 
header('Location:afficher.php');
?>