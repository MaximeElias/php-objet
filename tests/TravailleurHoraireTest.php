<?php

namespace Tests;

use DevWeb\ObjetPhp\TravailleurHoraire;

class TravailleurHoraireTest extends \PHPUnit\Framework\TestCase {

    /**
     * @test
     * @testdox Déclaration des attributs classe TravailleurHoraire
     */

    function test_attributs_TravailleurHoraire() {
        $trav = new TravailleurHoraire('Duchmol', 'Robert', 2000.00);
        $this->assertTrue(property_exists($trav,'nom'));
        $this->assertTrue(property_exists($trav,'prenom'));
        $this->assertTrue(property_exists($trav,'salaire'));
        $this->assertTrue(property_exists($trav,'taux'));
        $this->assertTrue(property_exists($trav,'quantite'));
    }

    /**
     * @test
     * @testdox Traitement d'un TravailleurHoraire
     */
    function test_traitement_TravailleurHoraire() {
        $p = new TravailleurHoraire('Duchmol', 'Robert', 2000.00);
        $p->setTaux(9.75);
        $p->setQuantite(10);
        $this->assertEquals( 2097.5, $p->traitement());
    }

    /**
     * @test
     * @testdox Affichage d'un TravailleurHoraire
     */
    function test_toString_TravailleurHoraire() {
        $p = new TravailleurHoraire('Duchmol', 'Robert', 2000.00);
        $p->setTaux(9.75);
        $p->setQuantite(10);
        $str = sprintf("id: %d, Robert Duchmol, traitement: 2097.50", ($p->getNumEmp()-1));
        $this->assertEquals($str, $p);
    }

    /**
     * @test
     * @testdox Clone d'un TravailleurHoraire
     */
    function test_clone_TravailleurCom() {
        $p = new TravailleurHoraire('Duchmol', 'Robert');
        $p->setTaux(5.25);
        $p->setQuantite(10);
        $p->setSalaire(1000);
        $p1 = clone($p);
        $p->setSalaire(2000);
        $this->assertInstanceOf(TravailleurHoraire::class, $p1);
        $this->assertEquals($p->getNom(), $p1->getNom());
        $this->assertEquals($p->getPrenom(), $p1->getPrenom());
        $this->assertNotEquals($p->getId(), $p1->getId());
        // erreur identifiée si la valeur de $p->traitement() n’est pas plus élevée que la valeur de $p1->traitement().
        $this->assertGreaterThan($p1->traitement(), $p->traitement());
    }
}