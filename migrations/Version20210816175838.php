<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210816175838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ja_translation (id INT AUTO_INCREMENT NOT NULL, movie_id INT DEFAULT NULL, ja_title VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_CD351E508F93B6FC (movie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ru_translation (id INT AUTO_INCREMENT NOT NULL, movie_id INT DEFAULT NULL, ru_title VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_EC60F0468F93B6FC (movie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zh_translation (id INT AUTO_INCREMENT NOT NULL, movie_id INT DEFAULT NULL, zh_title VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2C1228D48F93B6FC (movie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ja_translation ADD CONSTRAINT FK_CD351E508F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE ru_translation ADD CONSTRAINT FK_EC60F0468F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE zh_translation ADD CONSTRAINT FK_2C1228D48F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ja_translation');
        $this->addSql('DROP TABLE ru_translation');
        $this->addSql('DROP TABLE zh_translation');
    }
}
