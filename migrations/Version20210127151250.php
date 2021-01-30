<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210127151250 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, id_vendeur_id INT DEFAULT NULL, id_categorie_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix_depart DOUBLE PRECISION NOT NULL, date_fin DATETIME NOT NULL, prix_plafond DOUBLE PRECISION DEFAULT NULL, vente_immediate TINYINT(1) DEFAULT NULL, INDEX IDX_F65593E520068689 (id_vendeur_id), INDEX IDX_F65593E59F34925F (id_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enchere (id INT AUTO_INCREMENT NOT NULL, id_vendeur_id INT NOT NULL, id_acheteur_id INT NOT NULL, id_annonce_id INT NOT NULL, offre_enchere INT NOT NULL, date_enchere DATETIME NOT NULL, INDEX IDX_38D1870F20068689 (id_vendeur_id), INDEX IDX_38D1870F8EB576A8 (id_acheteur_id), INDEX IDX_38D1870F2D8F2BF8 (id_annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, id_envoi_id INT NOT NULL, id_recoit_id INT NOT NULL, pseudo VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, date_heure DATETIME NOT NULL, INDEX IDX_B6BD307F6F4C0070 (id_envoi_id), INDEX IDX_B6BD307F8AE13827 (id_recoit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, id_annonce_id INT DEFAULT NULL, chemin VARCHAR(1024) NOT NULL, INDEX IDX_14B784182D8F2BF8 (id_annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, vendeur TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vente_enchere (id INT AUTO_INCREMENT NOT NULL, id_vendeur_id INT NOT NULL, id_acheteur_id INT NOT NULL, id_annonce_id INT NOT NULL, offre_enchere INT NOT NULL, date_enchere DATETIME NOT NULL, UNIQUE INDEX UNIQ_67DB1BEF20068689 (id_vendeur_id), UNIQUE INDEX UNIQ_67DB1BEF8EB576A8 (id_acheteur_id), INDEX IDX_67DB1BEF2D8F2BF8 (id_annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vente_immediate (id INT AUTO_INCREMENT NOT NULL, id_annonce_id INT DEFAULT NULL, prix INT NOT NULL, UNIQUE INDEX UNIQ_5DBAB7482D8F2BF8 (id_annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E520068689 FOREIGN KEY (id_vendeur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E59F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE enchere ADD CONSTRAINT FK_38D1870F20068689 FOREIGN KEY (id_vendeur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE enchere ADD CONSTRAINT FK_38D1870F8EB576A8 FOREIGN KEY (id_acheteur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE enchere ADD CONSTRAINT FK_38D1870F2D8F2BF8 FOREIGN KEY (id_annonce_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F6F4C0070 FOREIGN KEY (id_envoi_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F8AE13827 FOREIGN KEY (id_recoit_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784182D8F2BF8 FOREIGN KEY (id_annonce_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE vente_enchere ADD CONSTRAINT FK_67DB1BEF20068689 FOREIGN KEY (id_vendeur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE vente_enchere ADD CONSTRAINT FK_67DB1BEF8EB576A8 FOREIGN KEY (id_acheteur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE vente_enchere ADD CONSTRAINT FK_67DB1BEF2D8F2BF8 FOREIGN KEY (id_annonce_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE vente_immediate ADD CONSTRAINT FK_5DBAB7482D8F2BF8 FOREIGN KEY (id_annonce_id) REFERENCES annonce (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enchere DROP FOREIGN KEY FK_38D1870F2D8F2BF8');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784182D8F2BF8');
        $this->addSql('ALTER TABLE vente_enchere DROP FOREIGN KEY FK_67DB1BEF2D8F2BF8');
        $this->addSql('ALTER TABLE vente_immediate DROP FOREIGN KEY FK_5DBAB7482D8F2BF8');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E59F34925F');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E520068689');
        $this->addSql('ALTER TABLE enchere DROP FOREIGN KEY FK_38D1870F20068689');
        $this->addSql('ALTER TABLE enchere DROP FOREIGN KEY FK_38D1870F8EB576A8');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F6F4C0070');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F8AE13827');
        $this->addSql('ALTER TABLE vente_enchere DROP FOREIGN KEY FK_67DB1BEF20068689');
        $this->addSql('ALTER TABLE vente_enchere DROP FOREIGN KEY FK_67DB1BEF8EB576A8');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE enchere');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE vente_enchere');
        $this->addSql('DROP TABLE vente_immediate');
    }
}
