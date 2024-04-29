<?php 
require '../config.php';
class reclamationC   {
    
    public function addreclamation($reclamation)
    {
      $sql = "INSERT INTO reclamation VALUES (NULL, :name, :email, :sujet, :message)";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "name" => $reclamation->getname(),
          "email" => $reclamation->getemail(),
          "sujet" => $reclamation->getsujet(),
          "message" => $reclamation->getmessage(),
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  
    public function updatereclamation($reclamation,$id)
    {
      $sql = "UPDATE reclamation SET name=:name,email=:email,sujet=:sujet,message=:message WHERE id = :id";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "id" => $id,
          "name" => $reclamation->getname(),
          "email" => $reclamation->getemail(),
          "sujet" => $reclamation->getsujet(),
          "message" => $reclamation->getmessage(),
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  
    public function deletereclamation($id)
    {
      $sql = "DELETE FROM reclamation WHERE id = :id";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "id" => $id,
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }

    public function allreclamation()
    {
      $sql = "SELECT * FROM reclamation";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute();
        $service = $query->fetch();
        $res = [];
        for ($x = 0; $service; $x++) {
          $res[$x] = $service;
          $service = $query->fetch();
        }
        return $res;
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
    public function findreclamation($id)
    {
      $sql = "SELECT * FROM reclamation WHERE id = :id";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "id" => $id,
        ]);
        $service = $query->fetch();
  
        return $service;
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
    public function findreclamationByemail($reclamation, $email)
    {
        $sql = "SELECT * FROM reclamation WHERE email = :email";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['email' => $email]);
            $reclamation = $query->fetch();
    
            if ($reclamation) {
                // Password matches (comparing as strings)
                return $reclamation;
            } else {
                // Invalid username or password
                return false;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    function recherchersujet($sujet){
      $sql="SELECT * From reclamation WHERE sujet= '$sujet' ";
      $db = config::getConnexion();
      try{
      $liste=$db->query($sql);
      return $liste;
      }
      catch (Exception $e){
        die('Erreur: '.$e->getMessage());
      }	
    }
    
    function rechercheremail($email){
      $sql="SELECT * From reclamation WHERE email = '$email' ";
      $db = config::getConnexion();
      try{
      $liste=$db->query($sql);
      return $liste;
      }
      catch (Exception $e){
        die('Erreur: '.$e->getMessage());
      }	
    }
}
?>


