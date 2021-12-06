<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211206130317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "user" ADD fistname VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD lastname VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD address VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD telefon VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD status BOOLEAN DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" DROP fistname');
        $this->addSql('ALTER TABLE "user" DROP lastname');
        $this->addSql('ALTER TABLE "user" DROP address');
        $this->addSql('ALTER TABLE "user" DROP telefon');
        $this->addSql('ALTER TABLE "user" DROP status');
    }
}
