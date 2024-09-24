<?php

namespace DevWeb\ObjetPhp;

class TravailleurCom extends Employe {

    private float $salaire;
    private float $commission = 0.0;
    private int $quantite = 0;

    public function __construct(string $nom, string $prenom, float $salaire = 0.0) {
        parent::__construct($nom, $prenom);
        $this->salaire = $salaire;
    }

    public function traitement() {
        return $this->salaire + ($this->commission * $this->quantite);
    }

    public function setCommission(float $commission): void {
        $this->commission = $commission;
    }

    public function setQuantite(int $quantite): void {
        $this->quantite = $quantite;
    }

    public function setSalaire(float $salaire): void {
        $this->salaire = $salaire;
    }

    public function getSalaire(): float {
        return $this->salaire;
    }

    public function getCommission(): float {
        return $this->commission;
    }

    public function getQuantite(): int {
        return $this->quantite;
    }

    public function __toString(): string {
        return sprintf("id: %d, %s %s, traitement: %.2f",
            $this->getId(),
            $this->getPrenom(),
            $this->getNom(),
            $this->traitement());
    }
}