<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250827113352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09835BE77B');
        $this->addSql('DROP INDEX IDX_52EA1F09835BE77B ON order_item');
        $this->addSql('ALTER TABLE order_item ADD order_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', DROP solicit_id, CHANGE product_id product_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F098D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_52EA1F098D9F6D38 ON order_item (order_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F098D9F6D38');
        $this->addSql('DROP INDEX IDX_52EA1F098D9F6D38 ON order_item');
        $this->addSql('ALTER TABLE order_item ADD solicit_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', DROP order_id, CHANGE product_id product_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09835BE77B FOREIGN KEY (solicit_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_52EA1F09835BE77B ON order_item (solicit_id)');
    }
}
