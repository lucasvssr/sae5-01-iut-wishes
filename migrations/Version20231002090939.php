<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231002090939 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE code_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE hours_week_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE information_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE role_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE affectation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE course_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE hour_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE referencial_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE affectation (id INT NOT NULL, teacher_id INT NOT NULL, course_id INT NOT NULL, nb_groups INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F4DD61D341807E1D ON affectation (teacher_id)');
        $this->addSql('CREATE INDEX IDX_F4DD61D3591CC992 ON affectation (course_id)');
        $this->addSql('CREATE TABLE course (id INT NOT NULL, subject_id INT NOT NULL, type_id INT NOT NULL, is_les BOOLEAN NOT NULL, max_groups INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_169E6FB923EDC87 ON course (subject_id)');
        $this->addSql('CREATE INDEX IDX_169E6FB9C54C8C93 ON course (type_id)');
        $this->addSql('CREATE TABLE hour (id INT NOT NULL, course_id INT NOT NULL, week_id INT NOT NULL, nb_hours DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_701E114E591CC992 ON hour (course_id)');
        $this->addSql('CREATE INDEX IDX_701E114EC86F3B2F ON hour (week_id)');
        $this->addSql('CREATE TABLE referencial (id INT NOT NULL, code VARCHAR(6) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE referencial_subject (referencial_id INT NOT NULL, subject_id INT NOT NULL, PRIMARY KEY(referencial_id, subject_id))');
        $this->addSql('CREATE INDEX IDX_AB820CAD7A4B5B9 ON referencial_subject (referencial_id)');
        $this->addSql('CREATE INDEX IDX_AB820CA23EDC87 ON referencial_subject (subject_id)');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D341807E1D FOREIGN KEY (teacher_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D3591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB923EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hour ADD CONSTRAINT FK_701E114E591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hour ADD CONSTRAINT FK_701E114EC86F3B2F FOREIGN KEY (week_id) REFERENCES week (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE referencial_subject ADD CONSTRAINT FK_AB820CAD7A4B5B9 FOREIGN KEY (referencial_id) REFERENCES referencial (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE referencial_subject ADD CONSTRAINT FK_AB820CA23EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE subject_semester DROP CONSTRAINT fk_cf45ce8523edc87');
        $this->addSql('ALTER TABLE subject_semester DROP CONSTRAINT fk_cf45ce854a798b6f');
        $this->addSql('ALTER TABLE code_subject DROP CONSTRAINT fk_c3697ae627dafe17');
        $this->addSql('ALTER TABLE code_subject DROP CONSTRAINT fk_c3697ae623edc87');
        $this->addSql('ALTER TABLE hours_week DROP CONSTRAINT fk_70ccadd823edc87');
        $this->addSql('ALTER TABLE hours_week DROP CONSTRAINT fk_70ccadd8c86f3b2f');
        $this->addSql('ALTER TABLE information DROP CONSTRAINT fk_29791883c54c8c93');
        $this->addSql('ALTER TABLE information DROP CONSTRAINT fk_2979188323edc87');
        $this->addSql('ALTER TABLE user_role DROP CONSTRAINT fk_2de8c6a3a76ed395');
        $this->addSql('ALTER TABLE user_role DROP CONSTRAINT fk_2de8c6a3d60322ac');
        $this->addSql('DROP TABLE subject_semester');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE code');
        $this->addSql('DROP TABLE code_subject');
        $this->addSql('DROP TABLE hours_week');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE user_role');
        $this->addSql('ALTER TABLE subject ALTER name TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE type ALTER name TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE "user" ADD roles JSON NOT NULL');
        $this->addSql('ALTER TABLE "user" ALTER first_name TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE "user" ALTER last_name TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE "user" ALTER email TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE "user" ALTER login TYPE VARCHAR(180)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649AA08CB10 ON "user" (login)');
        $this->addSql('ALTER TABLE week ADD semester_id INT NOT NULL');
        $this->addSql('ALTER TABLE week ADD is_apprenticeship BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE week ADD is_internship BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE week ADD is_les BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE week ADD CONSTRAINT FK_5B5A69C04A798B6F FOREIGN KEY (semester_id) REFERENCES semester (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_5B5A69C04A798B6F ON week (semester_id)');
        $this->addSql('ALTER TABLE wish DROP CONSTRAINT fk_d7d174c923edc87');
        $this->addSql('DROP INDEX idx_d7d174c923edc87');
        $this->addSql('ALTER TABLE wish RENAME COLUMN subject_id TO course_id');
        $this->addSql('ALTER TABLE wish ADD CONSTRAINT FK_D7D174C9591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D7D174C9591CC992 ON wish (course_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE wish DROP CONSTRAINT FK_D7D174C9591CC992');
        $this->addSql('DROP SEQUENCE affectation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE course_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE hour_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE referencial_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE code_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE hours_week_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE information_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE role_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE subject_semester (subject_id INT NOT NULL, semester_id INT NOT NULL, PRIMARY KEY(subject_id, semester_id))');
        $this->addSql('CREATE INDEX idx_cf45ce854a798b6f ON subject_semester (semester_id)');
        $this->addSql('CREATE INDEX idx_cf45ce8523edc87 ON subject_semester (subject_id)');
        $this->addSql('CREATE TABLE role (id INT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE code (id INT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE code_subject (code_id INT NOT NULL, subject_id INT NOT NULL, PRIMARY KEY(code_id, subject_id))');
        $this->addSql('CREATE INDEX idx_c3697ae623edc87 ON code_subject (subject_id)');
        $this->addSql('CREATE INDEX idx_c3697ae627dafe17 ON code_subject (code_id)');
        $this->addSql('CREATE TABLE hours_week (id INT NOT NULL, subject_id INT NOT NULL, week_id INT NOT NULL, nb_hours INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_70ccadd8c86f3b2f ON hours_week (week_id)');
        $this->addSql('CREATE INDEX idx_70ccadd823edc87 ON hours_week (subject_id)');
        $this->addSql('CREATE TABLE information (id INT NOT NULL, type_id INT NOT NULL, subject_id INT NOT NULL, hours INT NOT NULL, is_les BOOLEAN NOT NULL, max_groups INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_2979188323edc87 ON information (subject_id)');
        $this->addSql('CREATE INDEX idx_29791883c54c8c93 ON information (type_id)');
        $this->addSql('CREATE TABLE user_role (user_id INT NOT NULL, role_id INT NOT NULL, PRIMARY KEY(user_id, role_id))');
        $this->addSql('CREATE INDEX idx_2de8c6a3d60322ac ON user_role (role_id)');
        $this->addSql('CREATE INDEX idx_2de8c6a3a76ed395 ON user_role (user_id)');
        $this->addSql('ALTER TABLE subject_semester ADD CONSTRAINT fk_cf45ce8523edc87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE subject_semester ADD CONSTRAINT fk_cf45ce854a798b6f FOREIGN KEY (semester_id) REFERENCES semester (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE code_subject ADD CONSTRAINT fk_c3697ae627dafe17 FOREIGN KEY (code_id) REFERENCES code (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE code_subject ADD CONSTRAINT fk_c3697ae623edc87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hours_week ADD CONSTRAINT fk_70ccadd823edc87 FOREIGN KEY (subject_id) REFERENCES subject (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE hours_week ADD CONSTRAINT fk_70ccadd8c86f3b2f FOREIGN KEY (week_id) REFERENCES week (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT fk_29791883c54c8c93 FOREIGN KEY (type_id) REFERENCES type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT fk_2979188323edc87 FOREIGN KEY (subject_id) REFERENCES subject (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT fk_2de8c6a3a76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT fk_2de8c6a3d60322ac FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE affectation DROP CONSTRAINT FK_F4DD61D341807E1D');
        $this->addSql('ALTER TABLE affectation DROP CONSTRAINT FK_F4DD61D3591CC992');
        $this->addSql('ALTER TABLE course DROP CONSTRAINT FK_169E6FB923EDC87');
        $this->addSql('ALTER TABLE course DROP CONSTRAINT FK_169E6FB9C54C8C93');
        $this->addSql('ALTER TABLE hour DROP CONSTRAINT FK_701E114E591CC992');
        $this->addSql('ALTER TABLE hour DROP CONSTRAINT FK_701E114EC86F3B2F');
        $this->addSql('ALTER TABLE referencial_subject DROP CONSTRAINT FK_AB820CAD7A4B5B9');
        $this->addSql('ALTER TABLE referencial_subject DROP CONSTRAINT FK_AB820CA23EDC87');
        $this->addSql('DROP TABLE affectation');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE hour');
        $this->addSql('DROP TABLE referencial');
        $this->addSql('DROP TABLE referencial_subject');
        $this->addSql('DROP INDEX IDX_D7D174C9591CC992');
        $this->addSql('ALTER TABLE wish RENAME COLUMN course_id TO subject_id');
        $this->addSql('ALTER TABLE wish ADD CONSTRAINT fk_d7d174c923edc87 FOREIGN KEY (subject_id) REFERENCES subject (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_d7d174c923edc87 ON wish (subject_id)');
        $this->addSql('ALTER TABLE subject ALTER name TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE week DROP CONSTRAINT FK_5B5A69C04A798B6F');
        $this->addSql('DROP INDEX IDX_5B5A69C04A798B6F');
        $this->addSql('ALTER TABLE week DROP semester_id');
        $this->addSql('ALTER TABLE week DROP is_apprenticeship');
        $this->addSql('ALTER TABLE week DROP is_internship');
        $this->addSql('ALTER TABLE week DROP is_les');
        $this->addSql('ALTER TABLE type ALTER name TYPE VARCHAR(120)');
        $this->addSql('DROP INDEX UNIQ_8D93D649AA08CB10');
        $this->addSql('ALTER TABLE "user" DROP roles');
        $this->addSql('ALTER TABLE "user" ALTER login TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE "user" ALTER first_name TYPE VARCHAR(120)');
        $this->addSql('ALTER TABLE "user" ALTER last_name TYPE VARCHAR(120)');
        $this->addSql('ALTER TABLE "user" ALTER email TYPE VARCHAR(255)');
    }
}
