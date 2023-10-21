<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927174433 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE code_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE hours_week_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE information_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE role_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE semester_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE subject_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE week_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE wish_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE year_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE category_subject (category_id INT NOT NULL, subject_id INT NOT NULL, PRIMARY KEY(category_id, subject_id))');
        $this->addSql('CREATE INDEX IDX_3C167E0412469DE2 ON category_subject (category_id)');
        $this->addSql('CREATE INDEX IDX_3C167E0423EDC87 ON category_subject (subject_id)');
        $this->addSql('CREATE TABLE code (id INT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE code_subject (code_id INT NOT NULL, subject_id INT NOT NULL, PRIMARY KEY(code_id, subject_id))');
        $this->addSql('CREATE INDEX IDX_C3697AE627DAFE17 ON code_subject (code_id)');
        $this->addSql('CREATE INDEX IDX_C3697AE623EDC87 ON code_subject (subject_id)');
        $this->addSql('CREATE TABLE hours_week (id INT NOT NULL, subject_id INT NOT NULL, week_id INT NOT NULL, nb_hours INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_70CCADD823EDC87 ON hours_week (subject_id)');
        $this->addSql('CREATE INDEX IDX_70CCADD8C86F3B2F ON hours_week (week_id)');
        $this->addSql('CREATE TABLE information (id INT NOT NULL, type_id INT NOT NULL, subject_id INT NOT NULL, hours INT NOT NULL, is_les BOOLEAN NOT NULL, max_groups INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_29791883C54C8C93 ON information (type_id)');
        $this->addSql('CREATE INDEX IDX_2979188323EDC87 ON information (subject_id)');
        $this->addSql('CREATE TABLE role (id INT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE semester (id INT NOT NULL, year_id INT NOT NULL, number INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F7388EED40C1FEA7 ON semester (year_id)');
        $this->addSql('CREATE TABLE subject (id INT NOT NULL, name VARCHAR(100) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE subject_semester (subject_id INT NOT NULL, semester_id INT NOT NULL, PRIMARY KEY(subject_id, semester_id))');
        $this->addSql('CREATE INDEX IDX_CF45CE8523EDC87 ON subject_semester (subject_id)');
        $this->addSql('CREATE INDEX IDX_CF45CE854A798B6F ON subject_semester (semester_id)');
        $this->addSql('CREATE TABLE type (id INT NOT NULL, name VARCHAR(120) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, first_name VARCHAR(120) NOT NULL, last_name VARCHAR(120) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(12) NOT NULL, adress VARCHAR(255) NOT NULL, town VARCHAR(100) NOT NULL, postal_code VARCHAR(10) NOT NULL, login VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user_role (user_id INT NOT NULL, role_id INT NOT NULL, PRIMARY KEY(user_id, role_id))');
        $this->addSql('CREATE INDEX IDX_2DE8C6A3A76ED395 ON user_role (user_id)');
        $this->addSql('CREATE INDEX IDX_2DE8C6A3D60322AC ON user_role (role_id)');
        $this->addSql('CREATE TABLE week (id INT NOT NULL, is_holiday BOOLEAN NOT NULL, number INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE wish (id INT NOT NULL, teacher_id INT NOT NULL, subject_id INT NOT NULL, nb_groups INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D7D174C941807E1D ON wish (teacher_id)');
        $this->addSql('CREATE INDEX IDX_D7D174C923EDC87 ON wish (subject_id)');
        $this->addSql('CREATE TABLE year (id INT NOT NULL, start_year DATE NOT NULL, end_year DATE NOT NULL, limit_date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE category_subject ADD CONSTRAINT FK_3C167E0412469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE category_subject ADD CONSTRAINT FK_3C167E0423EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE code_subject ADD CONSTRAINT FK_C3697AE627DAFE17 FOREIGN KEY (code_id) REFERENCES code (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE code_subject ADD CONSTRAINT FK_C3697AE623EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hours_week ADD CONSTRAINT FK_70CCADD823EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hours_week ADD CONSTRAINT FK_70CCADD8C86F3B2F FOREIGN KEY (week_id) REFERENCES week (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_29791883C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_2979188323EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE semester ADD CONSTRAINT FK_F7388EED40C1FEA7 FOREIGN KEY (year_id) REFERENCES year (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE subject_semester ADD CONSTRAINT FK_CF45CE8523EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE subject_semester ADD CONSTRAINT FK_CF45CE854A798B6F FOREIGN KEY (semester_id) REFERENCES semester (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE wish ADD CONSTRAINT FK_D7D174C941807E1D FOREIGN KEY (teacher_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE wish ADD CONSTRAINT FK_D7D174C923EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE code_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE hours_week_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE information_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE role_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE semester_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE subject_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE week_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE wish_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE year_id_seq CASCADE');
        $this->addSql('ALTER TABLE category_subject DROP CONSTRAINT FK_3C167E0412469DE2');
        $this->addSql('ALTER TABLE category_subject DROP CONSTRAINT FK_3C167E0423EDC87');
        $this->addSql('ALTER TABLE code_subject DROP CONSTRAINT FK_C3697AE627DAFE17');
        $this->addSql('ALTER TABLE code_subject DROP CONSTRAINT FK_C3697AE623EDC87');
        $this->addSql('ALTER TABLE hours_week DROP CONSTRAINT FK_70CCADD823EDC87');
        $this->addSql('ALTER TABLE hours_week DROP CONSTRAINT FK_70CCADD8C86F3B2F');
        $this->addSql('ALTER TABLE information DROP CONSTRAINT FK_29791883C54C8C93');
        $this->addSql('ALTER TABLE information DROP CONSTRAINT FK_2979188323EDC87');
        $this->addSql('ALTER TABLE semester DROP CONSTRAINT FK_F7388EED40C1FEA7');
        $this->addSql('ALTER TABLE subject_semester DROP CONSTRAINT FK_CF45CE8523EDC87');
        $this->addSql('ALTER TABLE subject_semester DROP CONSTRAINT FK_CF45CE854A798B6F');
        $this->addSql('ALTER TABLE user_role DROP CONSTRAINT FK_2DE8C6A3A76ED395');
        $this->addSql('ALTER TABLE user_role DROP CONSTRAINT FK_2DE8C6A3D60322AC');
        $this->addSql('ALTER TABLE wish DROP CONSTRAINT FK_D7D174C941807E1D');
        $this->addSql('ALTER TABLE wish DROP CONSTRAINT FK_D7D174C923EDC87');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_subject');
        $this->addSql('DROP TABLE code');
        $this->addSql('DROP TABLE code_subject');
        $this->addSql('DROP TABLE hours_week');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE semester');
        $this->addSql('DROP TABLE subject');
        $this->addSql('DROP TABLE subject_semester');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE user_role');
        $this->addSql('DROP TABLE week');
        $this->addSql('DROP TABLE wish');
        $this->addSql('DROP TABLE year');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
