<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220619175452 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assureur (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, cod VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, numero INT NOT NULL, annee INT NOT NULL, date_consultation DATE NOT NULL, observation VARCHAR(255) NOT NULL, montant DOUBLE PRECISION NOT NULL, INDEX IDX_964685A66B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domaine (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaire (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, specialite_id INT NOT NULL, categorie_id INT NOT NULL, nationalite_id INT DEFAULT NULL, matricule VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, fax VARCHAR(255) DEFAULT NULL, INDEX IDX_1BDA53C62195E0F0 (specialite_id), INDEX IDX_1BDA53C6BCF5E72D (categorie_id), INDEX IDX_1BDA53C61B063272 (nationalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modereglement (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nationalite (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, horaire_id INT NOT NULL, patient_id INT NOT NULL, numero INT NOT NULL, annee INT NOT NULL, date_rdv DATE NOT NULL, observation VARCHAR(255) NOT NULL, INDEX IDX_10C31F8658C54515 (horaire_id), INDEX IDX_10C31F866B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reglement (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, modereglement_id INT NOT NULL, numero INT NOT NULL, annee INT NOT NULL, date_reglement DATE NOT NULL, mode_reglement VARCHAR(255) NOT NULL, num_piece VARCHAR(255) DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, observation VARCHAR(255) NOT NULL, INDEX IDX_EBE4C14C6B899279 (patient_id), INDEX IDX_EBE4C14C5D39DCF4 (modereglement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A66B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C62195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C6BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE medecin ADD CONSTRAINT FK_1BDA53C61B063272 FOREIGN KEY (nationalite_id) REFERENCES nationalite (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8658C54515 FOREIGN KEY (horaire_id) REFERENCES horaire (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F866B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE reglement ADD CONSTRAINT FK_EBE4C14C6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE reglement ADD CONSTRAINT FK_EBE4C14C5D39DCF4 FOREIGN KEY (modereglement_id) REFERENCES modereglement (id)');
        $this->addSql('ALTER TABLE patient ADD nationalite_id INT NOT NULL, ADD domaine_id INT DEFAULT NULL, ADD assureur_id INT NOT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB1B063272 FOREIGN KEY (nationalite_id) REFERENCES nationalite (id)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB4272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB80F7E20A FOREIGN KEY (assureur_id) REFERENCES assureur (id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EB1B063272 ON patient (nationalite_id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EB4272FC9F ON patient (domaine_id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EB80F7E20A ON patient (assureur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB80F7E20A');
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C6BCF5E72D');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB4272FC9F');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8658C54515');
        $this->addSql('ALTER TABLE reglement DROP FOREIGN KEY FK_EBE4C14C5D39DCF4');
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C61B063272');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB1B063272');
        $this->addSql('ALTER TABLE medecin DROP FOREIGN KEY FK_1BDA53C62195E0F0');
        $this->addSql('DROP TABLE assureur');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE domaine');
        $this->addSql('DROP TABLE horaire');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE modereglement');
        $this->addSql('DROP TABLE nationalite');
        $this->addSql('DROP TABLE rdv');
        $this->addSql('DROP TABLE reglement');
        $this->addSql('DROP TABLE specialite');
        $this->addSql('DROP INDEX IDX_1ADAD7EB1B063272 ON patient');
        $this->addSql('DROP INDEX IDX_1ADAD7EB4272FC9F ON patient');
        $this->addSql('DROP INDEX IDX_1ADAD7EB80F7E20A ON patient');
        $this->addSql('ALTER TABLE patient DROP nationalite_id, DROP domaine_id, DROP assureur_id');
    }
}
