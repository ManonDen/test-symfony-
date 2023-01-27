<?php
// specifier ds quel namespace est present ->dire où il est
namespace App\Entity;

class Personnage{

    public $nom;
    public $age;
    public $sexe;
    public $carac=[];

    public static $personnages=[];

    public function __construct($nom,$age,$sexe,$carac){
        $this->nom=$nom;
        $this->age=$age;
        $this->sexe=$sexe;
        $this->carac=$carac;
        self::$personnages[]=$this;
    }
    // static permet d'etre appellable de nimporte ou dans notre app
    public static function creerPersonnages(){
        $p1= new Personnage("Marc",25,true,[
            "force" => 3,
            "agi" => 2,
            "intel" => 3
        ]);
        $p2= new Personnage("Milo",30,true,[
            "force" => 3,
            "agi" => 2,
            "intel" => 3
        ]);
        $p3= new Personnage("Tya",22,false,[
            "force" => 3,
            "agi" => 2,
            "intel" => 3
        ]);
    
    }

    public static function getPersonnageParNom($nom){
        foreach(self::$personnages as $perso){
            if(strtolower($perso->nom)===$nom){
                return $perso;
            }
        }
    }



}