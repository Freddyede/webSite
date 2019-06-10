<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190610124657 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E9698333A1E');
        $this->addSql('CREATE TABLE mesage (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, INDEX IDX_738183C89D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mesage ADD CONSTRAINT FK_738183C89D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('DROP TABLE messages');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, users_id_id INT DEFAULT NULL, messages LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_DB021E9698333A1E (users_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E9698333A1E FOREIGN KEY (users_id_id) REFERENCES messages (id)');
        $this->addSql('DROP TABLE mesage');
    }
}
