<?php

namespace Tests;

use DevWeb\ObjetPhp\Parallelepipede;
use DevWeb\ObjetPhp\Figure;
use DevWeb\ObjetPhp\Rectangle;

class DrawableTest extends \PHPUnit\Framework\TestCase {

    /**
     * @test
     * @testdox Test interface Drawable
     */
    function test_dessine() {
        $f = new Figure();
        $this->assertEquals('dessine Figure : origine : Point ( 0.00,  0.00)', $f->dessine());
        $r = new Rectangle();
        $this->assertEquals('dessine Rectangle : origine : Point ( 0.00,  0.00), largeur :  0.00, longueur :  0.00', $r->dessine());
        $p = new Parallelepipede();
        $this->assertEquals('dessine Parallelepipede : origine : Point ( 0.00,  0.00), largeur :  0.00, longueur :  0.00, hauteur :  0.00', $p->dessine());
    }
}