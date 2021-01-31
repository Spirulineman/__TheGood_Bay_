<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210130150826 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vente_enchere ADD encherisseur_id INT DEFAULT NULL, ADD prix_depart INT NOT NULL, ADD prix_vendu INT NOT NULL, ADD proposition_encherisseur INT NOT NULL, ADD date_depart DATETIME NOT NULL, ADD date_fin_enchere DATETIME NOT NULL, ADD meilleur_prix INT NOT NULL, ADD gagnant TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE vente_enchere ADD CONSTRAINT FK_67DB1BEF91D60FC6 FOREIGN KEY (encherisseur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_67DB1BEF91D60FC6 ON vente_enchere (encherisseur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vente_enchere DROP FOREIGN KEY FK_67DB1BEF91D60FC6');
        $this->addSql('DROP INDEX IDX_67DB1BEF91D60FC6 ON vente_enchere');
        $this->addSql('ALTER TABLE vente_enchere DROP encherisseur_id, DROP prix_depart, DROP prix_vendu, DROP proposition_encherisseur, DROP date_depart, DROP date_fin_enchere, DROP meilleur_prix, DROP gagnant');
    }
}
