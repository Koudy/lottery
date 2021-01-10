<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Class Version20210110004833AddThing
 * @package DoctrineMigrations
 */
final class Version20210110004833AddThing extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE thing_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE thing (id INT NOT NULL, prize_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5B4C2C83BBE43214 ON thing (prize_id)');
        $this->addSql('ALTER TABLE thing ADD CONSTRAINT FK_5B4C2C83BBE43214 FOREIGN KEY (prize_id) REFERENCES prize (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE thing_id_seq CASCADE');
        $this->addSql('DROP TABLE thing');
    }
}
