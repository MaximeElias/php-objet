<?php

namespace Tests;

use DevWeb\ObjetPhp\Point;
use PHPUnit\Framework\TestCase;

class PointTest extends TestCase {

    /**
     * @test
     * @testdox Déclaration des attributs x et y
     */
    function test_attributs_x_et_y() {
        $point = new Point();
        $this->assertIsObject($point);
        $this->assertTrue(property_exists($point, 'x'));
        $this->assertTrue(property_exists($point, 'y'));
    }

    /**
     * @test
     * @testdox Test classe Point
     */
    function test_point() {
        $p = new Point;
        $this->assertInstanceOf(Point::class, $p);
    }
}