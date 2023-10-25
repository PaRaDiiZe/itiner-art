<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230317105235 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment CHANGE comment comment LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE oeuvre CHANGE description_o description_o LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE parcours CHANGE description description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment CHANGE comment comment VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE oeuvre CHANGE description_o description_o VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE parcours CHANGE description description VARCHAR(255) DEFAULT NULL');
    }
}
