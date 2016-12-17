#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        Id             int (11) Auto_increment  NOT NULL ,
        Mail           Varchar (25) ,
        Password       Varchar (50) ,
        Nom            Varchar (25) ,
        Prenom         Varchar (25) ,
        Date_naissance Varchar (25) ,
        Permission     Int ,
        PRIMARY KEY (Id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Appartements
#------------------------------------------------------------

CREATE TABLE Appartements(
        Id             int (11) Auto_increment  NOT NULL ,
        Nom            Varchar (25) ,
        Type           Int ,
        Adresse        Varchar (100) ,
        Ville          Varchar (25) ,
        Pays           Varchar (25) ,
        Nb_personne    Int ,
        Id_Utilisateur Int ,
        PRIMARY KEY (Id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Pieces
#------------------------------------------------------------

CREATE TABLE Pieces(
        Id              int (11) Auto_increment  NOT NULL ,
        Nom             Varchar (25) ,
        Id_Appartements Int ,
        PRIMARY KEY (Id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Fonctionnalite
#------------------------------------------------------------

CREATE TABLE Fonctionnalite(
        Id           int (11) Auto_increment  NOT NULL ,
        Nom          Varchar (25) ,
        Etat         Int ,
        Type_donnees Int ,
        PRIMARY KEY (Id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Capteur
#------------------------------------------------------------

CREATE TABLE Capteur(
        Id  int (11) Auto_increment  NOT NULL ,
        Nom Varchar (25) ,
        PRIMARY KEY (Id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Statistiques
#------------------------------------------------------------

CREATE TABLE Statistiques(
        Id         int (11) Auto_increment  NOT NULL ,
        Type       Varchar (25) ,
        Valeur     Float ,
        Id_Capteur Int ,
        PRIMARY KEY (Id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Pannes
#------------------------------------------------------------

CREATE TABLE Pannes(
        Id         int (11) Auto_increment  NOT NULL ,
        Niveau     Int ,
        Etat       Int ,
        Id_Capteur Int ,
        PRIMARY KEY (Id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Programmation
#------------------------------------------------------------

CREATE TABLE Programmation(
        Date_start        Date ,
        Date_end          Date ,
        Time_start        Time ,
        Time_end          Time ,
        Consigne          Float ,
        Correction        Float ,
        Id                Int NOT NULL ,
        Id_Fonctionnalite Int NOT NULL ,
        Id_Capteur        Int NOT NULL ,
        PRIMARY KEY (Id ,Id_Fonctionnalite ,Id_Capteur )
)ENGINE=InnoDB;

ALTER TABLE Appartements ADD CONSTRAINT FK_Appartements_Id_Utilisateur FOREIGN KEY (Id_Utilisateur) REFERENCES Utilisateur(Id);
ALTER TABLE Pieces ADD CONSTRAINT FK_Pieces_Id_Appartements FOREIGN KEY (Id_Appartements) REFERENCES Appartements(Id);
ALTER TABLE Statistiques ADD CONSTRAINT FK_Statistiques_Id_Capteur FOREIGN KEY (Id_Capteur) REFERENCES Capteur(Id);
ALTER TABLE Pannes ADD CONSTRAINT FK_Pannes_Id_Capteur FOREIGN KEY (Id_Capteur) REFERENCES Capteur(Id);
ALTER TABLE Programmation ADD CONSTRAINT FK_Programmation_Id FOREIGN KEY (Id) REFERENCES Pieces(Id);
ALTER TABLE Programmation ADD CONSTRAINT FK_Programmation_Id_Fonctionnalite FOREIGN KEY (Id_Fonctionnalite) REFERENCES Fonctionnalite(Id);
ALTER TABLE Programmation ADD CONSTRAINT FK_Programmation_Id_Capteur FOREIGN KEY (Id_Capteur) REFERENCES Capteur(Id);
