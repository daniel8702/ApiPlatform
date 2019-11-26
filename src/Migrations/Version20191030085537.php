<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191030085537 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE api_post ADD user_post_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE api_post ADD CONSTRAINT FK_7B7D1A7E13841D26 FOREIGN KEY (user_post_id) REFERENCES api_user (id)');
        $this->addSql('CREATE INDEX IDX_7B7D1A7E13841D26 ON api_post (user_post_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE api_post DROP FOREIGN KEY FK_7B7D1A7E13841D26');
        $this->addSql('DROP INDEX IDX_7B7D1A7E13841D26 ON api_post');
        $this->addSql('ALTER TABLE api_post DROP user_post_id');
    }
}
