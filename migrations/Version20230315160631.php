<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230315160631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, cat_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE oeuvre ADD rela_cat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE oeuvre ADD CONSTRAINT FK_35FE2EFEDEE3D6C1 FOREIGN KEY (rela_cat_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_35FE2EFEDEE3D6C1 ON oeuvre (rela_cat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oeuvre DROP FOREIGN KEY FK_35FE2EFEDEE3D6C1');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP INDEX IDX_35FE2EFEDEE3D6C1 ON oeuvre');
        $this->addSql('ALTER TABLE oeuvre DROP rela_cat_id');
    }
}
