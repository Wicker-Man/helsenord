<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220618212046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, age NUMERIC(10, 0) NOT NULL, adresse VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, etat_civil VARCHAR(255) NOT NULL, nom_conjoint VARCHAR(255) NOT NULL, lien_parente VARCHAR(255) NOT NULL, nbr_enfant INT NOT NULL, taille NUMERIC(10, 2) NOT NULL, poids INT NOT NULL, groupe_sanguin VARCHAR(255) NOT NULL, profession VARCHAR(255) NOT NULL, identifiant_uniaue VARCHAR(255) NOT NULL, priseen_charge VARCHAR(255) NOT NULL, assureur VARCHAR(255) NOT NULL, medecin_traitant VARCHAR(255) NOT NULL, date_premier_rdv DATE NOT NULL, date_dernier_rdv DATE NOT NULL, keyword VARCHAR(255) NOT NULL, regime_cnam VARCHAR(255) NOT NULL, date_validite DATE NOT NULL, qualite VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE patient');
    }
}
