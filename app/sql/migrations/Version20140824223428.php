<?php

namespace WellCommerce\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140824223428 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE media ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C3174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C65FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C63D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_6A2CA10C3174800F ON media (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_6A2CA10C65FF1AEC ON media (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_6A2CA10C63D8C20E ON media (deletedBy_id)');
        $this->addSql('ALTER TABLE currency ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE currency ADD CONSTRAINT FK_6956883F3174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE currency ADD CONSTRAINT FK_6956883F65FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE currency ADD CONSTRAINT FK_6956883F63D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_6956883F3174800F ON currency (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_6956883F65FF1AEC ON currency (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_6956883F63D8C20E ON currency (deletedBy_id)');
        $this->addSql('ALTER TABLE availability ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE availability ADD CONSTRAINT FK_3FB7A2BF3174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE availability ADD CONSTRAINT FK_3FB7A2BF65FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE availability ADD CONSTRAINT FK_3FB7A2BF63D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_3FB7A2BF3174800F ON availability (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_3FB7A2BF65FF1AEC ON availability (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_3FB7A2BF63D8C20E ON availability (deletedBy_id)');
        $this->addSql('ALTER TABLE deliverer ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE deliverer ADD CONSTRAINT FK_97FE33483174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE deliverer ADD CONSTRAINT FK_97FE334865FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE deliverer ADD CONSTRAINT FK_97FE334863D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_97FE33483174800F ON deliverer (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_97FE334865FF1AEC ON deliverer (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_97FE334863D8C20E ON deliverer (deletedBy_id)');
        $this->addSql('ALTER TABLE producer ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE producer ADD CONSTRAINT FK_976449DC3174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE producer ADD CONSTRAINT FK_976449DC65FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE producer ADD CONSTRAINT FK_976449DC63D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_976449DC3174800F ON producer (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_976449DC65FF1AEC ON producer (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_976449DC63D8C20E ON producer (deletedBy_id)');
        $this->addSql('ALTER TABLE tax ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tax ADD CONSTRAINT FK_8E81BA763174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE tax ADD CONSTRAINT FK_8E81BA7665FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE tax ADD CONSTRAINT FK_8E81BA7663D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_8E81BA763174800F ON tax (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_8E81BA7665FF1AEC ON tax (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_8E81BA7663D8C20E ON tax (deletedBy_id)');
        $this->addSql('ALTER TABLE unit ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE unit ADD CONSTRAINT FK_DCBB0C533174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE unit ADD CONSTRAINT FK_DCBB0C5365FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE unit ADD CONSTRAINT FK_DCBB0C5363D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_DCBB0C533174800F ON unit (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_DCBB0C5365FF1AEC ON unit (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_DCBB0C5363D8C20E ON unit (deletedBy_id)');
        $this->addSql('ALTER TABLE company ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_800230D33174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_800230D365FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_800230D363D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_800230D33174800F ON company (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_800230D365FF1AEC ON company (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_800230D363D8C20E ON company (deletedBy_id)');
        $this->addSql('ALTER TABLE contact ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6383174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E63865FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E63863D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_4C62E6383174800F ON contact (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_4C62E63865FF1AEC ON contact (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_4C62E63863D8C20E ON contact (deletedBy_id)');
        $this->addSql('ALTER TABLE client_group ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client_group ADD CONSTRAINT FK_CEADD8723174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE client_group ADD CONSTRAINT FK_CEADD87265FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE client_group ADD CONSTRAINT FK_CEADD87263D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_CEADD8723174800F ON client_group (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_CEADD87265FF1AEC ON client_group (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_CEADD87263D8C20E ON client_group (deletedBy_id)');
        $this->addSql('ALTER TABLE locale ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE locale ADD CONSTRAINT FK_462CC3AE3174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE locale ADD CONSTRAINT FK_462CC3AE65FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE locale ADD CONSTRAINT FK_462CC3AE63D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_462CC3AE3174800F ON locale (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_462CC3AE65FF1AEC ON locale (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_462CC3AE63D8C20E ON locale (deletedBy_id)');
        $this->addSql('ALTER TABLE shop ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA23174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA265FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA263D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_AC6A4CA23174800F ON shop (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_AC6A4CA265FF1AEC ON shop (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_AC6A4CA263D8C20E ON shop (deletedBy_id)');
        $this->addSql('ALTER TABLE users ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E93174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E965FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E963D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_1483A5E93174800F ON users (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_1483A5E965FF1AEC ON users (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_1483A5E963D8C20E ON users (deletedBy_id)');
        $this->addSql('ALTER TABLE layout_box ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE layout_box ADD CONSTRAINT FK_9E93FB793174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE layout_box ADD CONSTRAINT FK_9E93FB7965FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE layout_box ADD CONSTRAINT FK_9E93FB7963D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_9E93FB793174800F ON layout_box (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_9E93FB7965FF1AEC ON layout_box (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_9E93FB7963D8C20E ON layout_box (deletedBy_id)');
        $this->addSql('ALTER TABLE layout_page ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE layout_page ADD CONSTRAINT FK_FB499CB93174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE layout_page ADD CONSTRAINT FK_FB499CB965FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE layout_page ADD CONSTRAINT FK_FB499CB963D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_FB499CB93174800F ON layout_page (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_FB499CB965FF1AEC ON layout_page (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_FB499CB963D8C20E ON layout_page (deletedBy_id)');
        $this->addSql('ALTER TABLE layout_theme ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE layout_theme ADD CONSTRAINT FK_1E498FC23174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE layout_theme ADD CONSTRAINT FK_1E498FC265FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE layout_theme ADD CONSTRAINT FK_1E498FC263D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_1E498FC23174800F ON layout_theme (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_1E498FC265FF1AEC ON layout_theme (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_1E498FC263D8C20E ON layout_theme (deletedBy_id)');
        $this->addSql('ALTER TABLE product ADD createdBy_id INT DEFAULT NULL, ADD updatedBy_id INT DEFAULT NULL, ADD deletedBy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD3174800F FOREIGN KEY (createdBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD65FF1AEC FOREIGN KEY (updatedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD63D8C20E FOREIGN KEY (deletedBy_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_D34A04AD3174800F ON product (createdBy_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD65FF1AEC ON product (updatedBy_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD63D8C20E ON product (deletedBy_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE availability DROP FOREIGN KEY FK_3FB7A2BF3174800F');
        $this->addSql('ALTER TABLE availability DROP FOREIGN KEY FK_3FB7A2BF65FF1AEC');
        $this->addSql('ALTER TABLE availability DROP FOREIGN KEY FK_3FB7A2BF63D8C20E');
        $this->addSql('DROP INDEX IDX_3FB7A2BF3174800F ON availability');
        $this->addSql('DROP INDEX IDX_3FB7A2BF65FF1AEC ON availability');
        $this->addSql('DROP INDEX IDX_3FB7A2BF63D8C20E ON availability');
        $this->addSql('ALTER TABLE availability DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE client_group DROP FOREIGN KEY FK_CEADD8723174800F');
        $this->addSql('ALTER TABLE client_group DROP FOREIGN KEY FK_CEADD87265FF1AEC');
        $this->addSql('ALTER TABLE client_group DROP FOREIGN KEY FK_CEADD87263D8C20E');
        $this->addSql('DROP INDEX IDX_CEADD8723174800F ON client_group');
        $this->addSql('DROP INDEX IDX_CEADD87265FF1AEC ON client_group');
        $this->addSql('DROP INDEX IDX_CEADD87263D8C20E ON client_group');
        $this->addSql('ALTER TABLE client_group DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE Company DROP FOREIGN KEY FK_800230D33174800F');
        $this->addSql('ALTER TABLE Company DROP FOREIGN KEY FK_800230D365FF1AEC');
        $this->addSql('ALTER TABLE Company DROP FOREIGN KEY FK_800230D363D8C20E');
        $this->addSql('DROP INDEX IDX_800230D33174800F ON Company');
        $this->addSql('DROP INDEX IDX_800230D365FF1AEC ON Company');
        $this->addSql('DROP INDEX IDX_800230D363D8C20E ON Company');
        $this->addSql('ALTER TABLE Company DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6383174800F');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E63865FF1AEC');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E63863D8C20E');
        $this->addSql('DROP INDEX IDX_4C62E6383174800F ON contact');
        $this->addSql('DROP INDEX IDX_4C62E63865FF1AEC ON contact');
        $this->addSql('DROP INDEX IDX_4C62E63863D8C20E ON contact');
        $this->addSql('ALTER TABLE contact DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE currency DROP FOREIGN KEY FK_6956883F3174800F');
        $this->addSql('ALTER TABLE currency DROP FOREIGN KEY FK_6956883F65FF1AEC');
        $this->addSql('ALTER TABLE currency DROP FOREIGN KEY FK_6956883F63D8C20E');
        $this->addSql('DROP INDEX IDX_6956883F3174800F ON currency');
        $this->addSql('DROP INDEX IDX_6956883F65FF1AEC ON currency');
        $this->addSql('DROP INDEX IDX_6956883F63D8C20E ON currency');
        $this->addSql('ALTER TABLE currency DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE deliverer DROP FOREIGN KEY FK_97FE33483174800F');
        $this->addSql('ALTER TABLE deliverer DROP FOREIGN KEY FK_97FE334865FF1AEC');
        $this->addSql('ALTER TABLE deliverer DROP FOREIGN KEY FK_97FE334863D8C20E');
        $this->addSql('DROP INDEX IDX_97FE33483174800F ON deliverer');
        $this->addSql('DROP INDEX IDX_97FE334865FF1AEC ON deliverer');
        $this->addSql('DROP INDEX IDX_97FE334863D8C20E ON deliverer');
        $this->addSql('ALTER TABLE deliverer DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE layout_box DROP FOREIGN KEY FK_9E93FB793174800F');
        $this->addSql('ALTER TABLE layout_box DROP FOREIGN KEY FK_9E93FB7965FF1AEC');
        $this->addSql('ALTER TABLE layout_box DROP FOREIGN KEY FK_9E93FB7963D8C20E');
        $this->addSql('DROP INDEX IDX_9E93FB793174800F ON layout_box');
        $this->addSql('DROP INDEX IDX_9E93FB7965FF1AEC ON layout_box');
        $this->addSql('DROP INDEX IDX_9E93FB7963D8C20E ON layout_box');
        $this->addSql('ALTER TABLE layout_box DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE layout_page DROP FOREIGN KEY FK_FB499CB93174800F');
        $this->addSql('ALTER TABLE layout_page DROP FOREIGN KEY FK_FB499CB965FF1AEC');
        $this->addSql('ALTER TABLE layout_page DROP FOREIGN KEY FK_FB499CB963D8C20E');
        $this->addSql('DROP INDEX IDX_FB499CB93174800F ON layout_page');
        $this->addSql('DROP INDEX IDX_FB499CB965FF1AEC ON layout_page');
        $this->addSql('DROP INDEX IDX_FB499CB963D8C20E ON layout_page');
        $this->addSql('ALTER TABLE layout_page DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE layout_theme DROP FOREIGN KEY FK_1E498FC23174800F');
        $this->addSql('ALTER TABLE layout_theme DROP FOREIGN KEY FK_1E498FC265FF1AEC');
        $this->addSql('ALTER TABLE layout_theme DROP FOREIGN KEY FK_1E498FC263D8C20E');
        $this->addSql('DROP INDEX IDX_1E498FC23174800F ON layout_theme');
        $this->addSql('DROP INDEX IDX_1E498FC265FF1AEC ON layout_theme');
        $this->addSql('DROP INDEX IDX_1E498FC263D8C20E ON layout_theme');
        $this->addSql('ALTER TABLE layout_theme DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE Locale DROP FOREIGN KEY FK_462CC3AE3174800F');
        $this->addSql('ALTER TABLE Locale DROP FOREIGN KEY FK_462CC3AE65FF1AEC');
        $this->addSql('ALTER TABLE Locale DROP FOREIGN KEY FK_462CC3AE63D8C20E');
        $this->addSql('DROP INDEX IDX_462CC3AE3174800F ON Locale');
        $this->addSql('DROP INDEX IDX_462CC3AE65FF1AEC ON Locale');
        $this->addSql('DROP INDEX IDX_462CC3AE63D8C20E ON Locale');
        $this->addSql('ALTER TABLE Locale DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C3174800F');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C65FF1AEC');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C63D8C20E');
        $this->addSql('DROP INDEX IDX_6A2CA10C3174800F ON media');
        $this->addSql('DROP INDEX IDX_6A2CA10C65FF1AEC ON media');
        $this->addSql('DROP INDEX IDX_6A2CA10C63D8C20E ON media');
        $this->addSql('ALTER TABLE media DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE producer DROP FOREIGN KEY FK_976449DC3174800F');
        $this->addSql('ALTER TABLE producer DROP FOREIGN KEY FK_976449DC65FF1AEC');
        $this->addSql('ALTER TABLE producer DROP FOREIGN KEY FK_976449DC63D8C20E');
        $this->addSql('DROP INDEX IDX_976449DC3174800F ON producer');
        $this->addSql('DROP INDEX IDX_976449DC65FF1AEC ON producer');
        $this->addSql('DROP INDEX IDX_976449DC63D8C20E ON producer');
        $this->addSql('ALTER TABLE producer DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD3174800F');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD65FF1AEC');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD63D8C20E');
        $this->addSql('DROP INDEX IDX_D34A04AD3174800F ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD65FF1AEC ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD63D8C20E ON product');
        $this->addSql('ALTER TABLE product DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA23174800F');
        $this->addSql('ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA265FF1AEC');
        $this->addSql('ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA263D8C20E');
        $this->addSql('DROP INDEX IDX_AC6A4CA23174800F ON shop');
        $this->addSql('DROP INDEX IDX_AC6A4CA265FF1AEC ON shop');
        $this->addSql('DROP INDEX IDX_AC6A4CA263D8C20E ON shop');
        $this->addSql('ALTER TABLE shop DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE tax DROP FOREIGN KEY FK_8E81BA763174800F');
        $this->addSql('ALTER TABLE tax DROP FOREIGN KEY FK_8E81BA7665FF1AEC');
        $this->addSql('ALTER TABLE tax DROP FOREIGN KEY FK_8E81BA7663D8C20E');
        $this->addSql('DROP INDEX IDX_8E81BA763174800F ON tax');
        $this->addSql('DROP INDEX IDX_8E81BA7665FF1AEC ON tax');
        $this->addSql('DROP INDEX IDX_8E81BA7663D8C20E ON tax');
        $this->addSql('ALTER TABLE tax DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE unit DROP FOREIGN KEY FK_DCBB0C533174800F');
        $this->addSql('ALTER TABLE unit DROP FOREIGN KEY FK_DCBB0C5365FF1AEC');
        $this->addSql('ALTER TABLE unit DROP FOREIGN KEY FK_DCBB0C5363D8C20E');
        $this->addSql('DROP INDEX IDX_DCBB0C533174800F ON unit');
        $this->addSql('DROP INDEX IDX_DCBB0C5365FF1AEC ON unit');
        $this->addSql('DROP INDEX IDX_DCBB0C5363D8C20E ON unit');
        $this->addSql('ALTER TABLE unit DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E93174800F');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E965FF1AEC');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E963D8C20E');
        $this->addSql('DROP INDEX IDX_1483A5E93174800F ON users');
        $this->addSql('DROP INDEX IDX_1483A5E965FF1AEC ON users');
        $this->addSql('DROP INDEX IDX_1483A5E963D8C20E ON users');
        $this->addSql('ALTER TABLE users DROP createdBy_id, DROP updatedBy_id, DROP deletedBy_id');
    }
}
