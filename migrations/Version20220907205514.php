<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220907205514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ordini_magazzino (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, stock_user_id INT NOT NULL, create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', customer VARCHAR(255) NOT NULL, orderlist VARCHAR(255) NOT NULL, delivery_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ready_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', comments LONGTEXT DEFAULT NULL, INDEX IDX_A179CAA4A76ED395 (user_id), INDEX IDX_A179CAA4BEC8C336 (stock_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ordini_magazzino ADD CONSTRAINT FK_A179CAA4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ordini_magazzino ADD CONSTRAINT FK_A179CAA4BEC8C336 FOREIGN KEY (stock_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ordini_magazzino DROP FOREIGN KEY FK_A179CAA4A76ED395');
        $this->addSql('ALTER TABLE ordini_magazzino DROP FOREIGN KEY FK_A179CAA4BEC8C336');
        $this->addSql('DROP TABLE ordini_magazzino');
        $this->addSql('DROP TABLE user');
    }
}
