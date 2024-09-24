<?php

namespace DevWeb\ObjetPhp;

abstract class Employe {

    private static int $numEmp = 0;
    protected int $id;
    protected string $nom;
    protected string $prenom;

    public function __construct(string $nom, string $prenom) {
        $this->id = self::$numEmp;
        $this->nom = $nom;
        $this->prenom = $prenom;
        self::$numEmp++;
    }

    public function __toString(): string {
        return sprintf('id: %d, %s %s, traitement: %.2f',
            $this->id,
            $this->prenom,
            $this->nom,
            $this->traitement());
    }

    abstract public function traitement();

    public function getNom(): string {
        return $this->nom;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNumEmp(): int {
        return self::$numEmp;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom): void {
        $this->prenom = $prenom;
    }

    public function __clone() {
        self::$numEmp++;
        $this->id = self::$numEmp;
    }
}