<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180206130115 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C19EB6921');
        $this->addSql('DROP INDEX IDX_35D4282C19EB6921 ON commandes');
        $this->addSql('ALTER TABLE commandes DROP client_id');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD316882EA2E54');
        $this->addSql('DROP INDEX IDX_BFDD316882EA2E54 ON articles');
        $this->addSql('ALTER TABLE articles DROP commande_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articles ADD commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD316882EA2E54 FOREIGN KEY (commande_id) REFERENCES commandes (id)');
        $this->addSql('CREATE INDEX IDX_BFDD316882EA2E54 ON articles (commande_id)');
        $this->addSql('ALTER TABLE commandes ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('CREATE INDEX IDX_35D4282C19EB6921 ON commandes (client_id)');
    }
}
