<?php

namespace DevWeb\ObjetPhp;

class TravailleurHoraire extends Employe {

    private float $salaire;
    private float $taux;
    private int $quantite;

    public function __construct(string $nom, string $prenom, float $salaire = 0.0, float $taux = 0.0, int $quantite = 0) {
        parent::__construct($nom, $prenom);
        $this->salaire = $salaire;
        $this->taux = $taux;
        $this->quantite = $quantite;
    }

    public function traitement(): float {
        return $this->salaire + ($this->taux * $this->quantite);
    }

    public function getSalaire(): float {
        return $this->salaire;
    }

    public function getTaux(): float {
        return $this->taux;
    }

    public function getQuantite(): int {
        return $this->quantite;
    }

    public function setSalaire(float $salaire): void {
        $this->salaire = $salaire;
    }

    public function setTaux(float $taux): void {
        $this->taux = $taux;
    }

    public function setQuantite(int $quantite): void {
        $this->quantite = $quantite;
    }

    public function __toString(): string {
        return sprintf("id: %d, %s %s, traitement: %.2f",
            $this->getId(),
            $this->prenom,
            $this->nom,
            $this->traitement());
    }
}