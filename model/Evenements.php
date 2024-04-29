<?php
class evenements{
    private  $idevenements;
    private  $titre;
    private  $description;
    private  $heure_debut;
    private  $heure_fin;
    private $place;
    private $image;
    private $formation;

    public function __construct($titre,$description, $heure_debut,$heure_fin, $place,$image,$formation){
        $this->titre=$titre;
        $this->description=$description;
        $this->heure_debut=$heure_debut;
        $this->place = $place;
        $this->image = $image;
        $this->heure_fin = $heure_fin;
        $this->formation = $formation;
    }

    public function getIdevenements(){
        return $this->idevenements;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getHeureDebut(){
        return $this->heure_debut;
    }
    public function getHeureFin(){
        return $this->heure_fin;
    }
    public function getPlace(){
        return $this->place;
    }
    public function getImage(){
        return $this->image;
    }
    public function getformation(){
        return $this->formation;
    }
}
?>