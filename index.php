<?php
class Warrior {
    public function __construct(private int $life, private string $name, private $damage) {
    } // je défini mon constructor

    public function setLife($newLife) {
        $this->life = $newLife;
    }
    public function setName() {
        return $this->name;
    }
    public function setDamage($hitnumber) {
        $this->damage = $hitnumber;
    }
   
    public function getLife() {
        return $this->life;
    }
    public function getName() {
        return $this->name;
    }
    public function getDamage() {
        return $this->damage;
    }

    function warriorHit($warrior2){
        $remainingLife = $warrior2->getLife() - rand(40, 60);
        $warrior2->setLife($remainingLife);
        $warrior2->setDamage($warrior2->getDamage()+ 1);
        if ($warrior2->getLife() <= 0) {
            echo $warrior2->getName() . " a été vaincu en " . $warrior2->getDamage() . " coups";
        } else {
            echo $warrior2->getName() . " a maintenant " . $warrior2->getLife() . " points de vie restants." . "<br>";
        }
    }
}
    
// Initialise nos combattants
$warrior1 = new Warrior(rand(100, 200), 'Philippe',0);
$warrior2 = new Warrior(rand(100, 200), 'Michel',0);

// Boucle de jeu 
while ($warrior1->getLife() > 0 || $warrior2->getLife() > 0) {
    $warrior1->warriorHit($warrior2);
        if ($warrior2->getLife() <= 0) {
            break;
    }
    $warrior2->warriorHit($warrior1);
        if ($warrior1->getLife() <= 0) {
            break;
    }
}
?>