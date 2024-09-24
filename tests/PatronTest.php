<?php

namespace Tests;

use DevWeb\ObjetPhp\Patron;

class PatronTest extends \PHPUnit\Framework\TestCase {

    /**
     * @test
     * @testdox Déclaration des attributs classe Patron
     */
    function test_attributs_Patron() {
        $patron = new Patron('Duchmol', 'Robert', 4378.89);
        $this->assertTrue(property_exists($patron,'nom'));
        $this->assertTrue(property_exists($patron,'prenom'));
        $this->assertTrue(property_exists($patron,'id'));
        $this->assertTrue(property_exists($patron,'salaire'));
    }

    /**
     * @test
     * @testdox Création d'un patron
     */
    function test_creation_Patron() {
        $p = new Patron('Duchmol', 'Robert', 4378.89);
        $this->assertInstanceOf(Patron::class, $p);
    }

    /**
     * @test
     * @testdox Traitement d'un patron
     */
    function test_traitement_Patron() {
        $p = new Patron('Duchmol', 'Robert', 4378.89);
        $this->assertEquals(4378.89, $p->traitement());
    }

    /**
     * @test
     * @testdox Clone d'un patron
     */
    function test_clone_Patron() {
        $p = new Patron('Duchmol', 'Robert', 4378.89);
        $p1 = clone($p);
        $this->assertInstanceOf(Patron::class, $p1);
        $this->assertEquals($p->getNom(), $p1->getNom());
        $this->assertEquals($p->getPrenom(), $p1->getPrenom());
        $this->assertNotEquals($p->getId(), $p1->getId());
    }

    /**
     * @test
     * @testdox Affichage d'un patron
     */
    function test_toString_Patron() {
        $p = new Patron('Duchmol', 'Robert', 4378.89);
        $str = sprintf("id: %d, Robert Duchmol, traitement: 4378.89", ($p->getNumEmp()-1));
        $this->assertEquals($str, $p);
    }
}