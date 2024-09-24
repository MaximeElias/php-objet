<?php

namespace DevWeb\ObjetPhp;

class Rectangle extends Figure {

    protected float $largeur;
    protected float $longueur;

    /**
     * Constructeur de la classe Rectangle avec valeurs par défaut
     * @param float $largeur
     * @param float $longueur
     * @param Point|null $origine
     */
    public function __construct(float $largeur = 0.0, float $longueur = 0.0, ?Point $origine = null) {
        parent::__construct($origine); // Appel du constructeur parent pour l'origine
        $this->largeur = $largeur;
        $this->longueur = $longueur;
    }

    /**
     * Méthode toString pour représenter un rectangle en chaîne de caractères
     * @return string
     */
    public function __toString(): string {
        return sprintf(
            'Rectangle : origine : %s, largeur : %5.2f, longueur : %5.2f',
            $this->origine,
            $this->largeur,
            $this->longueur
        );
    }


    /**
     * Getter pour la largeur
     * @return float
     */
    public function getLargeur(): float {
        return $this->largeur;
    }

    /**
     * Setter pour la largeur
     * @param float $largeur
     */
    public function setLargeur(float $largeur): void {
        $this->largeur = $largeur;
    }

    /**
     * Getter pour la longueur
     * @return float
     */
    public function getLongueur(): float {
        return $this->longueur;
    }

    /**
     * Setter pour la longueur
     * @param float $longueur
     */
    public function setLongueur(float $longueur): void {
        $this->longueur = $longueur;
    }

    /**
     * Calcul de l'aire du rectangle
     * @return float
     */
    public function aire(): float {
        return $this->largeur * $this->longueur;
    }
}