#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Base de données: BDD
#------------------------------------------------------------

DROP database IF EXISTS lacriee;
CREATE DATABASE lacriee;

use lacriee;

#------------------------------------------------------------
# Table: Taille
#------------------------------------------------------------

CREATE TABLE Taille(
        idTaille      Int ,
        specification Varchar (25) NOT NULL ,
        PRIMARY KEY (idTaille )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Qualite
#------------------------------------------------------------

CREATE TABLE Qualite(
        idQual      Varchar (25) NOT NULL,
        libelleQual Varchar (25) ,
        PRIMARY KEY (idQual )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Bac
#------------------------------------------------------------

CREATE TABLE Bac(
        idBac Varchar (25) NOT NULL ,
        tare  float ,
        PRIMARY KEY (idBac )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Espece
#------------------------------------------------------------

CREATE TABLE Espece(
        idEsp     int NOT NULL AUTO_INCREMENT,
        nomComm   Varchar (25) ,
        nomScient Varchar (25) ,
	    	codeEsp Varchar (25) ,
	    	nomImg Varchar (100) ,
        PRIMARY KEY (idEsp )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Bateau
#------------------------------------------------------------

CREATE TABLE Bateau(
        idBateau              INT NOT NULL AUTO_INCREMENT,
        nomBateau             Varchar (25) ,
        immatriculationBateau Varchar (25) ,
        PRIMARY KEY (idBateau )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Peche
#------------------------------------------------------------

CREATE TABLE Peche(
        datePeche Date NOT NULL ,
        idBateau  INT NOT NULL ,
        PRIMARY KEY (datePeche ,idBateau )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Acheteur
#------------------------------------------------------------

CREATE TABLE Acheteur(
  idAcheteur       Varchar (25) NOT NULL ,
  login            Varchar (25) ,
  pwd              Varchar (25) ,
  raisonSocEnt     Varchar (50) ,
  adresse          Varchar (25) ,
  ville            Varchar (25) ,
  cp               Varchar (25) ,
  numHabillitation Varchar (25) ,
  PRIMARY KEY (idAcheteur )
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: Crieur
#------------------------------------------------------------

CREATE TABLE Crieur(
  idCrieur         Varchar (25) NOT NULL ,
  login            Varchar (25) ,
  pwd              Varchar (25) ,
  nom              Varchar (25) ,
  prenom           Varchar (25) ,
  adresse          Varchar (25) ,
  ville            Varchar (25) ,
  cp               Varchar (25) ,
  PRIMARY KEY (idCrieur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Lot
#------------------------------------------------------------

CREATE TABLE Lot(
		    datePeche         Date NOT NULL ,
        idBateau          INT NOT NULL ,
        idLot             int NOT NULL AUTO_INCREMENT,
	    	idEsp             int ,
	    	idTaille          int,
		    idPres            Varchar (25) ,
	    	idQual            Varchar (25) ,
        idBac             Varchar (25) ,		
        poidsBrutLot      float ,
        prixEnchere       float ,
        dateEnchere       Date ,
        heureDebutEnchere Datetime ,
        prixPlancher      float ,
        prixDepart        float ,
        codeEtat          Varchar (25) ,
        idAcheteur        Varchar (25) ,
        idFacture         Varchar (25) ,
        idCrieur          Varchar (25) ,
        PRIMARY KEY (idLot ,datePeche ,idBateau )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Presentation
#------------------------------------------------------------

CREATE TABLE Presentation(
        idPres      Varchar (25) NOT NULL ,
        libellePres Varchar (25) ,
        PRIMARY KEY (idPres )
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: Poster
#------------------------------------------------------------

CREATE TABLE Poster(
        datePeche    Date NOT NULL ,
		    idBateau    INT NOT NULL ,
        idLot        INT NOT NULL ,
        idAcheteur   Varchar (25) NOT NULL ,
	    	prixEnchere  float ,
	    	heureEnchere datetime,
        PRIMARY KEY (idLot ,datePeche ,idBateau ,idAcheteur )
)ENGINE=InnoDB;

ALTER TABLE Peche ADD CONSTRAINT FK_Peche_idBateau FOREIGN KEY (idBateau) REFERENCES Bateau(idBateau);
ALTER TABLE Lot ADD CONSTRAINT FK_Lot_datePeche FOREIGN KEY (datePeche) REFERENCES Peche(datePeche);
ALTER TABLE Lot ADD CONSTRAINT FK_Lot_idBateau FOREIGN KEY (idBateau) REFERENCES Peche(idBateau);
ALTER TABLE Lot ADD CONSTRAINT FK_Lot_idTaille FOREIGN KEY (idTaille) REFERENCES Taille(idTaille);
ALTER TABLE Lot ADD CONSTRAINT FK_Lot_idEsp FOREIGN KEY (idEsp) REFERENCES Espece(idEsp);
ALTER TABLE Lot ADD CONSTRAINT FK_Lot_idBac FOREIGN KEY (idBac) REFERENCES Bac(idBac);
ALTER TABLE Lot ADD CONSTRAINT FK_Lot_idQual FOREIGN KEY (idQual) REFERENCES Qualite(idQual);
ALTER TABLE Lot ADD CONSTRAINT FK_Lot_idPres FOREIGN KEY (idPres) REFERENCES Presentation(idPres);
ALTER TABLE Poster ADD CONSTRAINT FK_Poster_idLot FOREIGN KEY (idLot) REFERENCES Lot(idLot);
ALTER TABLE Poster ADD CONSTRAINT FK_Poster_datePeche FOREIGN KEY (datePeche) REFERENCES Peche(datePeche);
ALTER TABLE Poster ADD CONSTRAINT FK_Poster_idBateau FOREIGN KEY (idBateau) REFERENCES Bateau(idBateau);
ALTER TABLE Poster ADD CONSTRAINT FK_Poster_idAcheteur FOREIGN KEY (idAcheteur) REFERENCES Acheteur(idAcheteur);
ALTER TABLE Lot ADD CONSTRAINT FK_Lot_idAcheteur FOREIGN KEY (idAcheteur) REFERENCES Acheteur(idAcheteur);
ALTER TABLE Lot ADD CONSTRAINT FK_Lot_idCrieur FOREIGN KEY (idCrieur) REFERENCES Crieur(idCrieur);

/*Login	MDP	Autorisation

Admin	LED1	TOUS LES DROITS au niveau de la base de données
Visiteur	KEL1	LECTURE au niveau de la base de données


create user 'Admin'@'localhost' identified by 'admin123';
create user 'Visiteur'@'localhost' identified by 'visiteur123';


grant all on lacriee.* to 'Admin'@'localhost';
grant select on lacriee.* to 'Visiteur'@'localhost';
*/