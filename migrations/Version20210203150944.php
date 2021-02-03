<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203150944 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE knight ADD coterie_id INT DEFAULT NULL, ADD user_knight_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE knight ADD CONSTRAINT FK_409A6B0EC24C7BD FOREIGN KEY (coterie_id) REFERENCES coterie (id)');
        $this->addSql('ALTER TABLE knight ADD CONSTRAINT FK_409A6B0227E150B FOREIGN KEY (user_knight_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_409A6B0EC24C7BD ON knight (coterie_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_409A6B0227E150B ON knight (user_knight_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE knight DROP FOREIGN KEY FK_409A6B0EC24C7BD');
        $this->addSql('ALTER TABLE knight DROP FOREIGN KEY FK_409A6B0227E150B');
        $this->addSql('DROP INDEX IDX_409A6B0EC24C7BD ON knight');
        $this->addSql('DROP INDEX UNIQ_409A6B0227E150B ON knight');
        $this->addSql('ALTER TABLE knight DROP coterie_id, DROP user_knight_id');
    }
}
