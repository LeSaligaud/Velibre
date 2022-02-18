<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220218120513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE velo DROP FOREIGN KEY FK_354971F527C2E161');
        $this->addSql('DROP INDEX idx_354971f527c2e161 ON velo');
        $this->addSql('CREATE INDEX IDX_354971F521BDB235 ON velo (station_id)');
        $this->addSql('ALTER TABLE velo ADD CONSTRAINT FK_354971F527C2E161 FOREIGN KEY (station_id) REFERENCES station (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE velo DROP FOREIGN KEY FK_354971F521BDB235');
        $this->addSql('DROP INDEX idx_354971f521bdb235 ON velo');
        $this->addSql('CREATE INDEX IDX_354971F527C2E161 ON velo (station_id)');
        $this->addSql('ALTER TABLE velo ADD CONSTRAINT FK_354971F521BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
    }
}
