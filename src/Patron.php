<?php

namespace DevWeb\ObjetPhp;

class Patron extends Employe {

    private float $salaire;

    public function __construct(string $nom, string $prenom, float $salaire) {
        parent::__construct($nom, $prenom);
        $this->salaire = $salaire;
    }

    public function __toString(): string {
        return sprintf("id: %d, %s %s, traitement: %5.2f", $this->getId(), $this->prenom, $this->nom, $this->salaire);
    }

    public function traitement() {
        return $this->salaire;
    }

    public function getSalaire(): float {
        return $this->salaire;
    }

    public function setSalaire(float $salaire): void {
        $this->salaire = $salaire;
    }
}