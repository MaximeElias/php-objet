<?php

namespace Tests;

use DevWeb\ObjetPhp\TravailleurCom;

class TravailleurComTest extends \PHPUnit\Framework\TestCase{

    /**
     * @test
     * @testdox Déclaration des attributs classe TravailleurCom
     */
    function test_attributs_TravailleurCom() {
        $trav = new TravailleurCom('Duchmol', 'Robert');
        $this->assertTrue(property_exists($trav,'nom'));
        $this->assertTrue(property_exists($trav,'prenom'));
        $this->assertTrue(property_exists($trav,'salaire'));
        $this->assertTrue(property_exists($trav,'commission'));
        $this->assertTrue(property_exists($trav,'quantite'));
    }

    /**
     * @test
     * @testdox Traitement d'un TravailleurCom
     */
    function test_traitement_TravailleurCom() {
        $p = new TravailleurCom('Duchmol', 'Robert', 2000.00);
        $p->setCommission(5.25);
        $p->setQuantite(10);
        $this->assertEquals(2052.5, $p->traitement());
    }

    /**
     * @test
     * @testdox Affichage d'un TravailleurCom
     */
    function test_toString_TravailleurCom() {
        $p = new TravailleurCom('Duchmol', 'Robert', 2000.00);
        $p->setCommission(5.25);
        $p->setQuantite(10);
        $str = sprintf("id: %d, Robert Duchmol, traitement: 2052.50", ($p->getNumEmp()-1));
        $this->assertEquals($str, $p);
    }


    /**
     * @test
     * @testdox Clone d'un TravailleurCom
     */
    function test_clone_TravailleurCom() {
        $p = new TravailleurCom('Duchmol', 'Robert', 2000.00);
        $p->setCommission(5.25);
        $p->setQuantite(10);
        $p->setSalaire(1000);
        $p1 = clone($p);
        $p->setSalaire(2000);
        $this->assertInstanceOf(TravailleurCom::class, $p1);
        $this->assertEquals($p->getNom(), $p1->getNom());
        $this->assertEquals($p->getPrenom(), $p1->getPrenom());
        $this->assertNotEquals($p->getId(), $p1->getId());
        // erreur identifiée si la valeur de $p->traitement() n’est pas plus élevée que la valeur de $p1->traitement().
        $this->assertGreaterThan($p1->traitement(), $p->traitement());
    }
}