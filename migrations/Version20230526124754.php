<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230526124754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C7F2DEE08');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282CCD11A2CF');
        $this->addSql('DROP INDEX IDX_35D4282C7F2DEE08 ON commandes');
        $this->addSql('DROP INDEX IDX_35D4282CCD11A2CF ON commandes');
        $this->addSql('ALTER TABLE commandes ADD factures_id INT NOT NULL, ADD produit_id INT NOT NULL, DROP facture_id, DROP produits_id');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CE9D518F9 FOREIGN KEY (factures_id) REFERENCES facture (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CF347EFB FOREIGN KEY (produit_id) REFERENCES produits (id)');
        $this->addSql('CREATE INDEX IDX_35D4282CE9D518F9 ON commandes (factures_id)');
        $this->addSql('CREATE INDEX IDX_35D4282CF347EFB ON commandes (produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282CE9D518F9');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282CF347EFB');
        $this->addSql('DROP INDEX IDX_35D4282CE9D518F9 ON commandes');
        $this->addSql('DROP INDEX IDX_35D4282CF347EFB ON commandes');
        $this->addSql('ALTER TABLE commandes ADD facture_id INT NOT NULL, ADD produits_id INT NOT NULL, DROP factures_id, DROP produit_id');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C7F2DEE08 FOREIGN KEY (facture_id) REFERENCES commandes (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CCD11A2CF FOREIGN KEY (produits_id) REFERENCES commandes (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_35D4282C7F2DEE08 ON commandes (facture_id)');
        $this->addSql('CREATE INDEX IDX_35D4282CCD11A2CF ON commandes (produits_id)');
    }
}
