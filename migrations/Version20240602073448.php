<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240602073448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C35F0816A76ED395 ON adresse (user_id)');
        $this->addSql('ALTER TABLE contact ADD adresse_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6384DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4C62E6384DE7DC5C ON contact (adresse_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4C62E638A76ED395 ON contact (user_id)');
        $this->addSql('ALTER TABLE facture ADD user_id INT DEFAULT NULL, ADD contact_id INT DEFAULT NULL, ADD adresse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE8664104DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FE866410A76ED395 ON facture (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FE866410E7A1254A ON facture (contact_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FE8664104DE7DC5C ON facture (adresse_id)');
        $this->addSql('ALTER TABLE prestation ADD user_id INT DEFAULT NULL, ADD adresse_id INT DEFAULT NULL, ADD contact_id INT DEFAULT NULL, ADD facture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FADA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FAD4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FADE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FAD7F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_51C88FADA76ED395 ON prestation (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_51C88FAD4DE7DC5C ON prestation (adresse_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_51C88FADE7A1254A ON prestation (contact_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_51C88FAD7F2DEE08 ON prestation (facture_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816A76ED395');
        $this->addSql('DROP INDEX UNIQ_C35F0816A76ED395 ON adresse');
        $this->addSql('ALTER TABLE adresse DROP user_id');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6384DE7DC5C');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638A76ED395');
        $this->addSql('DROP INDEX UNIQ_4C62E6384DE7DC5C ON contact');
        $this->addSql('DROP INDEX UNIQ_4C62E638A76ED395 ON contact');
        $this->addSql('ALTER TABLE contact DROP adresse_id, DROP user_id');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FADA76ED395');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FAD4DE7DC5C');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FADE7A1254A');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FAD7F2DEE08');
        $this->addSql('DROP INDEX UNIQ_51C88FADA76ED395 ON prestation');
        $this->addSql('DROP INDEX UNIQ_51C88FAD4DE7DC5C ON prestation');
        $this->addSql('DROP INDEX UNIQ_51C88FADE7A1254A ON prestation');
        $this->addSql('DROP INDEX UNIQ_51C88FAD7F2DEE08 ON prestation');
        $this->addSql('ALTER TABLE prestation DROP user_id, DROP adresse_id, DROP contact_id, DROP facture_id');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410A76ED395');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410E7A1254A');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE8664104DE7DC5C');
        $this->addSql('DROP INDEX UNIQ_FE866410A76ED395 ON facture');
        $this->addSql('DROP INDEX UNIQ_FE866410E7A1254A ON facture');
        $this->addSql('DROP INDEX UNIQ_FE8664104DE7DC5C ON facture');
        $this->addSql('ALTER TABLE facture DROP user_id, DROP contact_id, DROP adresse_id');
    }
}
