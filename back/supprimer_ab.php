<?php 

$id = $_GET['id'];
include_once "../controller/reclamationC.php";

$userC= new reclamationC();
$userC->deletereclamation($id); 
header('Location:afficherab.php');




?>