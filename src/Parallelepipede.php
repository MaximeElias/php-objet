<?php

namespace DevWeb\ObjetPhp;

class Parallelepipede extends Rectangle {

    protected float $hauteur;

    public function __construct(float $largeur = 0.0, float $longueur = 0.0, float $hauteur = 0.0,  ?Point $origine = null) {
        parent::__construct($largeur, $longueur, $origine);
        $this->hauteur = $hauteur;
    }

    public function __toString(): string {
        return sprintf(
            'Parallelepipede : origine : %s, largeur : %5.2f, longueur : %5.2f, hauteur : %5.2f',
            $this->origine,
            $this->largeur,
            $this->longueur,
            $this->hauteur
        );
    }

    public function getHauteur(): float {
        return $this->hauteur;
    }

    public function setHauteur(float $hauteur): void {
        $this->hauteur = $hauteur;
    }

    public function volume(): float {
        return $this->aire() * $this->hauteur;
    }
}