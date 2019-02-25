<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190225093529 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE clients (idclients INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(45) DEFAULT NULL, firstname VARCHAR(45) DEFAULT NULL, mail VARCHAR(45) DEFAULT NULL, register_date DATE DEFAULT NULL, current_offre INT DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(idclients)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Offers (id INT AUTO_INCREMENT NOT NULL, offer_name VARCHAR(50) NOT NULL, description VARCHAR(255) NOT NULL, price VARCHAR(50) NOT NULL, time_location VARCHAR(50) NOT NULL, options VARCHAR(80) NOT NULL, pictures VARCHAR(255) NOT NULL, nb_scooter_total VARCHAR(255) NOT NULL, nb_scooter_available VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (idorder INT AUTO_INCREMENT NOT NULL, idclient INT DEFAULT NULL, offre VARCHAR(45) DEFAULT NULL, options VARCHAR(45) DEFAULT NULL, price INT DEFAULT NULL, date_order DATE DEFAULT NULL, idscooter INT DEFAULT NULL, PRIMARY KEY(idorder)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scooter (idscooter INT AUTO_INCREMENT NOT NULL, scooter_name VARCHAR(45) DEFAULT NULL, scooter_model VARCHAR(45) DEFAULT NULL, id_offer INT NOT NULL, scooter_date_entry DATE DEFAULT NULL, scooter_date_next_maintenance DATE DEFAULT NULL, scooter_date_last_maintenance DATE DEFAULT NULL, scooter_statement VARCHAR(45) DEFAULT NULL, PRIMARY KEY(idscooter)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE Offers');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE scooter');
    }
}
