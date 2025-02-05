<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250205114910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invoice_item (id INT AUTO_INCREMENT NOT NULL, invoice_id INT NOT NULL, invoice_description VARCHAR(255) NOT NULL, quantity INT NOT NULL, unit_price NUMERIC(10, 2) NOT NULL, INDEX IDX_1DDE477B2989F1FD (invoice_id), PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE invoices (id INT AUTO_INCREMENT NOT NULL, amount NUMERIC(10, 2) NOT NULL, invoice_number VARCHAR(255) NOT NULL, invoice_status INT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE invoice_item ADD CONSTRAINT FK_1DDE477B2989F1FD FOREIGN KEY (invoice_id) REFERENCES invoices (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoice_item DROP FOREIGN KEY FK_1DDE477B2989F1FD');
        $this->addSql('DROP TABLE invoice_item');
        $this->addSql('DROP TABLE invoices');
    }
}
