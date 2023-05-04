<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230429190921 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message CHANGE message message VARCHAR(65535) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE image image VARCHAR(65535) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE image image VARCHAR(65535) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message CHANGE message message MEDIUMTEXT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE image image MEDIUMTEXT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE image image MEDIUMTEXT NOT NULL');
    }
}