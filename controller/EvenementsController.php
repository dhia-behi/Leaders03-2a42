<?php
include('C:\xampp\htdocs\web\projet\projet\config.php');

class evenementsController{
public function showevenements()
{
    $sql="SELECT * FROM evenements";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
       $e->getMessage();
    }
}
public function deleteevenements($id){
    $sql="DELETE FROM evenements WHERE idevenements = :id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id' , $id);
    try{
        $req->execute();
    }
    catch(Exception $e){
        $e->getMessage();
    }
}
public function addevenements($evenements){
    $sql = "INSERT INTO evenements (titre,description,heure_debut,heure_fin,place,image,formation)
    VALUES (:titre, :description, :heure_debut, :heure_fin, :place, :image, :formation)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute([
        'titre'=> $evenements->getTitre(),
        'description'=> $evenements->getDescription(),
        'heure_debut'=> $evenements->getHeureDebut(),
        'heure_fin' => $evenements->getHeureFin(),
        'place'=> $evenements->getPlace(),
        'image'=> $evenements->getImage(),
        'formation' => $evenements->getformation(),
        ]);
    } catch (Exception $e){
        $e->getMessage();
    }
}
public function getevenements($id){
    $sql="SELECT * from evenements where idevenements = :id";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->bindValue(':id' , $id);
        $query->execute();
        $evenements=$query->fetch();
        return $evenements;
    }catch (Exception $e){
        $e->getMessage();
    }
}
public function updateevenements($id,$evenements){
    try{
        $db = config::getConnexion();
        $query = $db->prepare('UPDATE evenements SET titre = :titre, description = :description, heure_debut = :heure_debut, heure_fin = :heure_fin, place = :place, image = :image WHERE idevenements = :id');
        $query->execute([
            'titre'=> $evenements->getTitre(),
            'description'=> $evenements->getDescription(),
            'heure_debut'=> $evenements->getHeureDebut(),
            'heure_fin' => $evenements->getHeureFin(),
            'place'=> $evenements->getPlace(),
            'image'=> $evenements->getImage(),
            'id'=> $id
        ]);
    } catch (Exception $e){
        $e->getMessage();
}
}
public function joinformation($id)
{
   try{
    $db = config::getConnexion();
    $sql = "SELECT a.*, c.titre AS ctitre FROM evenements AS a INNER JOIN formation AS c ON a.formation = c.idformation WHERE c.idformation = :id";
    $query = $db->prepare($sql);
    $query->bindValue(':id',$id);
    $query->execute();
    $evenements = $query->fetchAll();
    return $evenements;
   }catch(Exception $e){
    $e->getMessage();
   } 
}
}
?>