<?php

namespace Tests;

use DevWeb\ObjetPhp\Parallelepipede;
use DevWeb\ObjetPhp\Point;

class ParallelepipedeTest extends \PHPUnit\Framework\TestCase {

    /**
     * @test
     * @testdox Déclaration de l'attribut hauteur
     */
    function test_attribut_hauteur() {
        $para = new Parallelepipede();
        $this->assertTrue(property_exists($para,'hauteur'));
    }

    /**
     * @test
     * @testdox Test class Parallelepipede
     */
    function test_Parallelepipede() {
        $p = new Parallelepipede();
        $this->assertInstanceOf(Parallelepipede::class, $p);
    }


    /**
     * @test
     * @testdox Test toString Parallélépipède
     */
    function test_toString_parallelepipede() {
        $p = new Parallelepipede();
        $this->assertEquals('Parallelepipede : origine : Point ( 0.00,  0.00), largeur :  0.00, longueur :  0.00, hauteur :  0.00', "" . $p);
        $p = new Parallelepipede(10, 20, 2, new Point(10.52, 20.13));
        $this->assertEquals('Parallelepipede : origine : Point (10.52, 20.13), largeur : 10.00, longueur : 20.00, hauteur :  2.00', "" . $p);
    }


    /**
     * @test
     * @testdox Test getXXX Parallélépipède
     */
    function test_get_parallelepipede() {
        $pa = new Parallelepipede();
        $p = new Point();
        $this->assertEquals("" . $p, "" . $pa->getOrigine());
        $this->assertEquals(0.0, "" . $pa->getLongueur());
        $this->assertEquals(0.0, "" . $pa->getLargeur());
        $this->assertEquals(0.0, "" . $pa->getHauteur());
        $p = new Point(10.52, 20.13);
        $pa = new Parallelepipede(20, 10, 3, $p);
        $this->assertEquals("" . $p, "" . $pa->getOrigine());
        $this->assertEquals(10.0, "" . $pa->getLongueur());
        $this->assertEquals(20.0, "" . $pa->getLargeur());
        $this->assertEquals(3.0, "" . $pa->getHauteur());
    }

    /**
     * @test
     * @testdox Test setXXX Parallélépipède
     */
    function test_set_parallelepipede() {
        $pa = new Parallelepipede();
        $p = new Point();
        $pa->setOrigine();
        $this->assertEquals("" . $p, "" . $pa->getOrigine());
        $p = new Point(10.52, 20.13);
        $pa->setOrigine($p);
        $this->assertEquals("" . $p, "" . $pa->getOrigine());
        $pa->setLongueur(10);
        $this->assertEquals(10.0, $pa->getLongueur());
        $pa->setLargeur(20);
        $this->assertEquals(20.0, $pa->getLargeur());
        $pa->setHauteur(15.5);
        $this->assertEquals(15.5, $pa->getHauteur());
        $this->assertEquals('Parallelepipede : origine : Point (10.52, 20.13), largeur : 20.00, longueur : 10.00, hauteur : 15.50', "" . $pa);
    }

    /**
     * @test
     * @testdox Test calcul du volume d'un parallélépipède
     */
    function test_volume_parallelepipede() {
        $r = new Parallelepipede();
        $p = new Point();
        $r->setOrigine();
        $this->assertEquals(0.0, $r->volume());
        $r->setLongueur(10);
        $r->setLargeur(20);
        $r->setHauteur(1);
        $this->assertEquals(200.0, $r->volume());
    }
}