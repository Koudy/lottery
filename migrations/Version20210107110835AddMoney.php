<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210107110835AddMoney extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE money_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE money (id INT NOT NULL, prize_id INT NOT NULL, sum INT NOT NULL, currency VARCHAR(3) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B7DF13E4BBE43214 ON money (prize_id)');
        $this->addSql('ALTER TABLE money ADD CONSTRAINT FK_B7DF13E4BBE43214 FOREIGN KEY (prize_id) REFERENCES prize (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER INDEX idx_cac822d9a76ed395 RENAME TO IDX_51C88BC1A76ED395');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE money_id_seq CASCADE');
        $this->addSql('DROP TABLE money');
        $this->addSql('ALTER INDEX idx_51c88bc1a76ed395 RENAME TO idx_cac822d9a76ed395');
    }
}
