<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210105211302AddPrize extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('CREATE SEQUENCE prize_id_seq INCREMENT BY 1 MINVALUE 1 START 1');

        $this->addSql('
            CREATE TABLE prize (
                id INT NOT NULL,
                user_id INT NOT NULL,
                type VARCHAR(255) NOT NULL,
                PRIMARY KEY(id)
            )
        ');

        $this->addSql('CREATE INDEX IDX_CAC822D9A76ED395 ON prize (user_id)');
        $this->addSql('ALTER TABLE prize ADD CONSTRAINT FK_CAC822D9A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('ALTER TABLE prize DROP CONSTRAINT FK_CAC822D9A76ED395');
        $this->addSql('DROP SEQUENCE prize_id_seq CASCADE');
        $this->addSql('DROP TABLE prize');
    }
}
