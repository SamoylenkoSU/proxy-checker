<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240925103645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE proxy (id INT AUTO_INCREMENT NOT NULL, report_id INT NOT NULL, value VARCHAR(255) NOT NULL, type INT DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, external_ip VARCHAR(255) DEFAULT NULL, timeout DECIMAL(10,4) NULL DEFAULT NULL, active TINYINT(1) DEFAULT NULL, checked TINYINT(1) NOT NULL, INDEX IDX_7372C9BE4BD2A4C0 (report_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE report (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE proxy ADD CONSTRAINT FK_7372C9BE4BD2A4C0 FOREIGN KEY (report_id) REFERENCES report (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proxy DROP FOREIGN KEY FK_7372C9BE4BD2A4C0');
        $this->addSql('DROP TABLE proxy');
        $this->addSql('DROP TABLE report');
    }
}
