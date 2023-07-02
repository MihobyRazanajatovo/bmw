Create database wb;
use wb;

CREATE TABLE administrateur(
    idAdmin int not null AUTO_INCREMENT,
    nomAdmin VARCHAR(100),
    prenomAdmin VARCHAR (50),
    email VARCHAR (100),
    numeroTel int,
    mot_de_passe VARCHAR(50),
    PRIMARY KEY (idAdmin)
);

CREATE TABLE vetement (
    idVetement int not null AUTO_INCREMENT,
    nomVetement VARCHAR (50),
    PrixUnitaire int,
    PRIMARY key (idVetement)
);

CREATE TABLE client (
    idClient INT not null AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    telephone VARCHAR(15) NOT NULL
);
-- taloha
CREATE TABLE commande (
    idCommande int not null AUTO_INCREMENT,
    idClient int,
    idVetement int,
    dateCommande DATE,
    timeCommande TIME,
    quantite int,
    PRIMARY KEY ( idCommande),
    FOREIGN KEY (idClient) REFERENCES client(idClient),
    FOREIGN KEY(idVetement) REFERENCES vetement(idVetement)
);

CREATE TABLE facture(
    idFacture int not null AUTO_INCREMENT,
    idClient int,
    PRIMARY KEY (idFacture),
    FOREIGN KEY (idClient) REFERENCES client(idClient)
);

CREATE TABLE details_facture (
    idDetailsFacture int not null AUTO_INCREMENT,
    idCommande int,
    idFacture int,
    PRIMARY KEY (idDetailsFacture),
    FOREIGN KEY (idCommande) REFERENCES commande(idCommande),
    FOREIGN KEY (idFacture) REFERENCES facture(idFacture)
);


INSERT into administrateur (idAdmin, nomAdmin, prenomAdmin,email, numeroTel, mot_de_passe) values (1,'Rakotonoely','Rotsy','rotsy@gmail.com',0347829718,'shiky');

INSERT INTO vetement (idVetement, nomVetement, PrixUnitaire) values (1,'Torchon',300);
INSERT INTO vetement (idVetement, nomVetement, PrixUnitaire) values (2,'Vêtements léger',400);
INSERT INTO vetement (idVetement, nomVetement, PrixUnitaire) values (3,'Pantalon',500);
INSERT INTO vetement (idVetement, nomVetement, PrixUnitaire) values (4,'Blouson',500);
INSERT INTO vetement (idVetement, nomVetement, PrixUnitaire) values (7,'Serviette',800);
INSERT INTO vetement (idVetement, nomVetement, PrixUnitaire) values (5,'Drap',1000);
INSERT INTO vetement (idVetement, nomVetement, PrixUnitaire) values (6,'Couette',6000);

CREATE VIEW DC AS
SELECT c.idCommande, c.idClient, c.dateCommande, c.timeCommande, d.idDetailsCommande, d.idVetement, d.quantite
FROM commande c
JOIN details_commande d ON c.idCommande = d.idCommande;

CREATE VIEW vue_facture AS 
SELECT * ,
