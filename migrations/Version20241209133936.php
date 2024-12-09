<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241209133936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abat_jour (id SERIAL NOT NULL, marque_id INT NOT NULL, titre VARCHAR(50) NOT NULL, description TEXT NOT NULL, couleur VARCHAR(20) NOT NULL, matiere VARCHAR(50) NOT NULL, forme VARCHAR(20) NOT NULL, dimensions VARCHAR(255) NOT NULL, code_barre VARCHAR(13) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C3BD70CA4827B9B2 ON abat_jour (marque_id)');
        $this->addSql('ALTER TABLE abat_jour ADD CONSTRAINT FK_C3BD70CA4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE abat_jour DROP CONSTRAINT FK_C3BD70CA4827B9B2');
        $this->addSql('DROP TABLE abat_jour');
    }
}
