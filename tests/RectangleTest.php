<?php

namespace Tests;

use DevWeb\ObjetPhp\Point;
use DevWeb\ObjetPhp\Rectangle;

class RectangleTest extends \PHPUnit\Framework\TestCase {

    /**
     * @test
     * @testdox Déclaration des attributs dans la classe Rectangle
     */
    function test_attributs_Rectangle_largeur_et_longueur_origine() {
        $rectangle = new Rectangle();
        $this->assertTrue(property_exists($rectangle,'origine'));
        $this->assertTrue(property_exists($rectangle,'largeur'));
        $this->assertTrue(property_exists($rectangle,'longueur'));
    }


    /**
     * @test
     * @testdox Test class Rectangle
     */
    function test_Rectangle() {
        $r = new Rectangle();
        $this->assertInstanceOf(Rectangle::class, $r);
    }


    /**
     * @test
     * @testdox Test toString Rectangle
     */
    function test_toString_rectangle() {
        $r = new Rectangle();
        $this->assertEquals('Rectangle : origine : Point ( 0.00,  0.00), largeur :  0.00, longueur :  0.00', "" . $r);
        $r = new Rectangle(20, 10, new Point(10.52, 20.13));
        $this->assertEquals('Rectangle : origine : Point (10.52, 20.13), largeur : 20.00, longueur : 10.00', "" . $r);
    }

    /**
     * @test
     * @testdox Test getXXX Rectangle
     */
    function test_get_rectangle() {
        $r = new Rectangle();
        $p = new Point();
        $this->assertEquals("" . $p, "" . $r->getOrigine());
        $this->assertEquals(0.0, "" . $r->getLongueur());
        $this->assertEquals(0.0, "" . $r->getLargeur());
        $p = new Point(10.52, 20.13);
        $r = new Rectangle(20, 10, $p);
        $this->assertEquals("" . $p, "" . $r->getOrigine());
        $this->assertEquals(10.0, "" . $r->getLongueur());
        $this->assertEquals(20.0, "" . $r->getLargeur());
    }

    /**
     * @test
     * @testdox Test setXXX Rectangle
     */
    function test_set_rectangle() {
        $r = new Rectangle();
        $p = new Point();
        $r->setOrigine();
        $this->assertEquals("" . $p, "" . $r->getOrigine());
        $p = new Point(10.52, 20.13);
        $r->setOrigine($p);
        $this->assertEquals("" . $p, "" . $r->getOrigine());
        $r->setLongueur(10);
        $this->assertEquals(10.0, $r->getLongueur());
        $r->setLargeur(20);
        $this->assertEquals(20.0, $r->getLargeur());
        $this->assertEquals('Rectangle : origine : Point (10.52, 20.13), largeur : 20.00, longueur : 10.00', "" . $r);
    }

    /**
     * @test
     * @testdox test calcul de l'aire d'un Rectangle
     */
    function test_aire_rectangle() {
        $r = new Rectangle();
        $p = new Point();
        $r->setOrigine();
        $this->assertEquals(0.0, $r->aire());
        $r->setLongueur(10);
        $r->setLargeur(20);
        $this->assertEquals(200.0, $r->aire());
    }
}