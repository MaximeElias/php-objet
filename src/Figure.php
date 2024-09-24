<?php

namespace DevWeb\ObjetPhp;

class Figure implements Drawable {

    protected Point $origine;

    /**
     * @param Point|null $origine
     */
    public function __construct(?Point $origine = null) {
        // Si aucune origine n'est fournie, initialisation à (0.0, 0.0)
        $this->origine = $origine ?? new Point(0.0, 0.0);
    }

    public function getOrigine(): Point {
        return $this->origine;
    }

    /**
     * @param Point|null $origine
     */
    public function setOrigine(?Point $origine = null): void {
        // Si null est passé, l'origine est réinitialisée à (0.0, 0.0)
        $this->origine = $origine ?? new Point(0.0, 0.0);
    }

    /**
     * Représente l'objet Figure en tant que chaîne de caractères
     * @return string
     */
    public function __toString(): string {
        return 'Figure : origine : ' . $this->origine;
    }

    public function dessine(): string {
        return 'dessine '.$this->__toString()  ;
    }
}