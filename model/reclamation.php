<?php 

class reclamation{

   private $name;
   private $email;
   private $sujet;
   private $message;

    public $userAttributeCount=5;

    function getsujet(){
        return $this->sujet;
    }
    function getemail(){
        return $this->email;
    }
    function getmessage(){
        return $this->message;
    }
    function getname(){
        return $this->name;
    }

    
    function __construct($name,$email,$sujet,$message){
        $this->name = $name;
        $this->email = $email;
        $this->sujet = $sujet;
        $this->message = $message;
    }
    


    function affichage(){  
    } 
}
?>


