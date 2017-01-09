CREATE TABLE Affectation(
        Id                Int NOT NULL ,
        Id_Pieces         Int NOT NULL ,
        Id_Fonctionnalite Int NOT NULL ,
        PRIMARY KEY (Id ,Id_Pieces ,Id_Fonctionnalite )
)ENGINE=InnoDB;

ALTER TABLE Affectation ADD CONSTRAINT FK_Affectation_Id FOREIGN KEY (Id) REFERENCES Capteur(Id);
ALTER TABLE Affectation ADD CONSTRAINT FK_Affectation_Id_Pieces FOREIGN KEY (Id_Pieces) REFERENCES Pieces(Id);
ALTER TABLE Affectation ADD CONSTRAINT FK_Affectation_Id_Fonctionnalite FOREIGN KEY (Id_Fonctionnalite) REFERENCES Fonctionnalite(Id);