<?php 
require '../config.php';
class reponseC   {
    
    public function addreponse($reponse)
    {
      $sql = "INSERT INTO reponse VALUES (NULL, :idreclamation, :email, :nom, :reponse)";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "idreclamation" => $reponse->getIdreclamation(),
          "email" => $reponse->getemail(),
          "nom" => $reponse->getNom(),
          "reponse" => $reponse->getReponse(),
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  
    public function updatereponse($reponse,$id,$idrec)
    {
      $sql = "UPDATE reponse SET idreclamation=:idreclamation,email=:email,nom=:nom,reponse=:reponse WHERE id = :id";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "id" => $id,
          "idreclamation" => $idrec,
          "email" => $reponse->getemail(),
          "nom" => $reponse->getNom(),
          "reponse" => $reponse->getReponse(),
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  
    public function deletereponse($id)
{
  $sql = "DELETE FROM reponse WHERE id = :id";
  $db = config::getConnexion();
  try {
    $query = $db->prepare($sql);
    $query->execute(["id" => $id]);
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
}
    public function allreponse()
    {
      $sql = "SELECT * FROM reponse";
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
    public function findreponse($id)
    {
      $sql = "SELECT * FROM reponse WHERE id = :id";
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
    public function findreponseByemail($reponse, $email)
    {
        $sql = "SELECT * FROM reponse WHERE email = :email";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['email' => $email]);
            $reponse = $query->fetch();
    
            if ($reponse) {
                // Password matches (comparing as strings)
                return $reponse;
            } else {
                // Invalid username or password
                return false;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function findReponseByIdRec($idrec)
    {
      $sql = "SELECT * FROM reponse WHERE idreclamation = :idreclamation";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "idreclamation" => $idrec,
        ]);
        $responses = $query->fetchAll(); // Changed from fetch() to fetchAll()
      
        return $responses;
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  }
?>


