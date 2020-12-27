<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201224100520 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498B870E04');
        $this->addSql('DROP INDEX IDX_8D93D6498B870E04 ON user');
        $this->addSql('ALTER TABLE user CHANGE id_customer_id customer_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6499395C3F3 ON user (customer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499395C3F3');
        $this->addSql('DROP INDEX IDX_8D93D6499395C3F3 ON user');
        $this->addSql('ALTER TABLE user CHANGE customer_id id_customer_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498B870E04 FOREIGN KEY (id_customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6498B870E04 ON user (id_customer_id)');
    }
}