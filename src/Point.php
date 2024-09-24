<?php
/**
 * Contenu du fichier Point.php
 */

namespace DevWeb\ObjetPhp;

class Point {

    protected float $x;
    protected float $y;

    /**
     * @param float $x
     * @param float $y
     */
    public function __construct(float $x = 0, float $y = 0) {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): float {
        return $this->x;
    }

    public function getY(): float {
        return $this->y;
    }

    public function setX(float $x): void {
        $this->x = $x;
    }

    public function setY(float $y): void {
        $this->y = $y;
    }

    public function __toString() {
        return sprintf("Point (%5.2f, %5.2f)", $this->x, $this->y);
    }
}