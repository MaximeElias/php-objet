<?php

namespace Tests;

use DevWeb\ObjetPhp\Figure;
use DevWeb\ObjetPhp\Point;

class FigureTest extends \PHPUnit\Framework\TestCase {

    /**
     * @test
     * @testdox Déclaration de l'attribut origine
     */
    function test_attributs_origine() {
        $figure = new Figure();
        $this->assertTrue(property_exists($figure, 'origine'));
    }

    /**
     * @test
     * @testdox Test classe Figure
     */
    function test_class_figure() {
        $f = new Figure();
        $this->assertInstanceOf(Figure::class, $f);
    }

    /**
     * @test
     * @testdox Test toString Figure
     */
    function test_toString_figure() {
        $f = new Figure();
        $this->assertEquals('Figure : origine : Point ( 0.00,  0.00)', "" . $f);
        $f = new Figure(new Point(10.52, 20.13));
        $this->assertEquals('Figure : origine : Point (10.52, 20.13)', "" . $f);
    }


    /**
     * @test
     * @testdox Test getOrigine Figure
     */
    function test_get_Origine() {
        $f = new Figure();
        $p = new Point();
        $this->assertEquals("" . $p, "" . $f->getOrigine());
        $p = new Point(10.52, 20.13);
        $f = new Figure($p);
        $this->assertEquals("" . $p, "" . $f->getOrigine());
    }

    /**
     * @test
     * @testdox Test setOrigine Figure
     */
    function test_set_Origine() {
        $f = new Figure();
        $p = new Point();
        $f->setOrigine();
        $this->assertEquals("" . $p, "" . $f->getOrigine());
        $p = new Point(10.52, 20.13);
        $f->setOrigine($p);
        $this->assertEquals("" . $p, "" . $f->getOrigine());
    }
}