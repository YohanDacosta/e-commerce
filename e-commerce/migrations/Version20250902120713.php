<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250902120713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD34C6E038');
        $this->addSql('DROP TABLE product_media_object');
        $this->addSql('DROP INDEX UNIQ_D34A04AD34C6E038 ON product');
        $this->addSql('ALTER TABLE product ADD file_path VARCHAR(255) DEFAULT NULL, DROP product_media_object_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_media_object (id INT AUTO_INCREMENT NOT NULL, file_path VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE product ADD product_media_object_id INT DEFAULT NULL, DROP file_path');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD34C6E038 FOREIGN KEY (product_media_object_id) REFERENCES product_media_object (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD34C6E038 ON product (product_media_object_id)');
    }
}
