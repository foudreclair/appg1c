CREATE TABLE `Affectation` (
  `Id` int(11) NOT NULL,
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

ALTER TABLE `Affectation`
  ADD CONSTRAINT `FK_Affectation_Id_Capteur` FOREIGN KEY (`Id_Capteur`) REFERENCES `Capteur` (`Id`);
  ADD CONSTRAINT `FK_Affectation_Id_Fonctionnalite` FOREIGN KEY (`Id_Fonctionnalite`) REFERENCES `Fonctionnalite` (`Id`);
  ADD CONSTRAINT `FK_Affectation_Id_Pieces` FOREIGN KEY (`Id_Pieces`) REFERENCES `Pieces` (`Id`);
