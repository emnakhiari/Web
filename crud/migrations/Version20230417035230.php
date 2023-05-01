<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230417035230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY AProduit');
        $this->addSql('CREATE TABLE saved (id INT AUTO_INCREMENT NOT NULL, image LONGTEXT NOT NULL, description LONGTEXT NOT NULL, titre VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY addCommentaire');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY AFavoris');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY addMessage');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE favoris');
        $this->addSql('DROP TABLE livreur');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE rdv');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE produit MODIFY IdProduit INT NOT NULL');
        $this->addSql('DROP INDEX AProduit ON produit');
        $this->addSql('DROP INDEX Id_utilisateur ON produit');
        $this->addSql('DROP INDEX `primary` ON produit');
        $this->addSql('ALTER TABLE produit ADD image LONGTEXT NOT NULL, ADD description LONGTEXT NOT NULL, ADD titre VARCHAR(255) NOT NULL, ADD categorie VARCHAR(255) NOT NULL, DROP nom, CHANGE IdProduit id INT AUTO_INCREMENT NOT NULL, CHANGE Id_utilisateur prix INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id_avis INT AUTO_INCREMENT NOT NULL, etoile VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, raison VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id_avis)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commande (id_commande INT AUTO_INCREMENT NOT NULL, id_utilisateur INT NOT NULL, id_utilisateurA INT NOT NULL, id_produit INT NOT NULL, date_livraison DATE NOT NULL, date_confirmation DATE DEFAULT \'CURRENT_TIMESTAMP\' NOT NULL, role VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, status INT DEFAULT 0 NOT NULL, id_livreur INT DEFAULT NULL, PRIMARY KEY(id_commande)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, commentaire TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Id_utilisateur INT NOT NULL, Date DATE NOT NULL, INDEX addCommentaire (Id_utilisateur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE facture (idFacture INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, Montant DOUBLE PRECISION NOT NULL, PRIMARY KEY(idFacture)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE favoris (id INT AUTO_INCREMENT NOT NULL, Id_utilisateur INT NOT NULL, nbre_Produits INT NOT NULL, INDEX AFavoris (Id_utilisateur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livreur (id_livreur INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, num INT NOT NULL, PRIMARY KEY(id_livreur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE message (idMessage INT AUTO_INCREMENT NOT NULL, message TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date DATE NOT NULL, Id_utilisateur INT NOT NULL, INDEX addMessage (Id_utilisateur), PRIMARY KEY(idMessage)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE notification (id INT NOT NULL, Contenu VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE rdv (idRDV INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, heure VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(idRDV)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateur (Id_utilisateur INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, numero VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Adresse VARCHAR(500) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, motDepasse VARCHAR(8) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, AdresseEmail VARCHAR(500) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Image TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Type VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, nombreProduitAchetes INT NOT NULL, nombreProduitPublier INT NOT NULL, nombreProduitVendus INT NOT NULL, avis INT NOT NULL, role VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(Id_utilisateur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT addCommentaire FOREIGN KEY (Id_utilisateur) REFERENCES utilisateur (Id_utilisateur) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT AFavoris FOREIGN KEY (Id_utilisateur) REFERENCES utilisateur (Id_utilisateur) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT addMessage FOREIGN KEY (Id_utilisateur) REFERENCES utilisateur (Id_utilisateur) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP TABLE saved');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE produit MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON produit');
        $this->addSql('ALTER TABLE produit ADD nom VARCHAR(20) NOT NULL, DROP image, DROP description, DROP titre, DROP categorie, CHANGE id IdProduit INT AUTO_INCREMENT NOT NULL, CHANGE prix Id_utilisateur INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT AProduit FOREIGN KEY (Id_utilisateur) REFERENCES utilisateur (Id_utilisateur) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX AProduit ON produit (Id_utilisateur)');
        $this->addSql('CREATE INDEX Id_utilisateur ON produit (Id_utilisateur)');
        $this->addSql('ALTER TABLE produit ADD PRIMARY KEY (IdProduit)');
    }
}
