<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230315160900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oeuvre ADD rela_oeuvre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE oeuvre ADD CONSTRAINT FK_35FE2EFE536B8B90 FOREIGN KEY (rela_oeuvre_id) REFERENCES parcours (id)');
        $this->addSql('CREATE INDEX IDX_35FE2EFE536B8B90 ON oeuvre (rela_oeuvre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oeuvre DROP FOREIGN KEY FK_35FE2EFE536B8B90');
        $this->addSql('DROP INDEX IDX_35FE2EFE536B8B90 ON oeuvre');
        $this->addSql('ALTER TABLE oeuvre DROP rela_oeuvre_id');
    }
}
