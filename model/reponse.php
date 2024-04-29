<?php 

class reponse{

   private $idreclamation;
   private $email;
   private $nom;
   private $reponse;

    public $userAttributeCount=5;

    function getIdreclamation(){
        return $this->idreclamation;
    }
    function getEmail(){
        return $this->email;
    }
    function getNom(){
        return $this->nom;
    }
    function getReponse(){
        return $this->reponse;
    }

    
    function __construct($idreclamation,$email,$nom,$reponse){
        $this->idreclamation = $idreclamation;
        $this->email = $email;
        $this->nom = $nom;
        $this->reponse = $reponse;
    }
    


    function affichage(){  
    } 
}
?>


