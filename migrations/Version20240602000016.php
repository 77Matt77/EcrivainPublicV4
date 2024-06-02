<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240602000016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, contact_id INT DEFAULT NULL, facture_id INT DEFAULT NULL, prestation_id INT DEFAULT NULL, numero_de_la_voie VARCHAR(255) NOT NULL, voie VARCHAR(100) NOT NULL, code_postal VARCHAR(10) NOT NULL, ville VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_C35F0816E7A1254A (contact_id), UNIQUE INDEX UNIQ_C35F08167F2DEE08 (facture_id), UNIQUE INDEX UNIQ_C35F08169E45C554 (prestation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, facture_id INT DEFAULT NULL, prestation_id INT DEFAULT NULL, message LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_4C62E6387F2DEE08 (facture_id), UNIQUE INDEX UNIQ_4C62E6389E45C554 (prestation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, prestation_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, date DATETIME NOT NULL, UNIQUE INDEX UNIQ_FE8664109E45C554 (prestation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation (id INT AUTO_INCREMENT NOT NULL, nom_de_la_prestation VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, adresse_id INT DEFAULT NULL, contact_id INT DEFAULT NULL, facture_id INT DEFAULT NULL, prestation_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(20) NOT NULL, prenom VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_8D93D6494DE7DC5C (adresse_id), UNIQUE INDEX UNIQ_8D93D649E7A1254A (contact_id), UNIQUE INDEX UNIQ_8D93D6497F2DEE08 (facture_id), UNIQUE INDEX UNIQ_8D93D6499E45C554 (prestation_id), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F08167F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F08169E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6387F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6389E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE8664109E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816E7A1254A');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F08167F2DEE08');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F08169E45C554');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6387F2DEE08');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6389E45C554');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE8664109E45C554');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494DE7DC5C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E7A1254A');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497F2DEE08');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499E45C554');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE prestation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
