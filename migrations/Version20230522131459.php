<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522131459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, facture_id INT NOT NULL, produits_id INT NOT NULL, quantite NUMERIC(10, 2) NOT NULL, INDEX IDX_35D4282C7F2DEE08 (facture_id), INDEX IDX_35D4282CCD11A2CF (produits_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, facture_id INT NOT NULL, INDEX IDX_FE866410A76ED395 (user_id), INDEX IDX_FE8664107F2DEE08 (facture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C7F2DEE08 FOREIGN KEY (facture_id) REFERENCES commandes (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CCD11A2CF FOREIGN KEY (produits_id) REFERENCES commandes (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410A76ED395 FOREIGN KEY (user_id) REFERENCES facture (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE8664107F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C7F2DEE08');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282CCD11A2CF');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410A76ED395');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE8664107F2DEE08');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE facture');
    }
}
