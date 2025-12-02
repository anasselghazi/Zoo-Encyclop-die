CREATE DATABASE zoo ;


 use zoo ;

CREATE TABLE HABITAT ( 
    idHab int PRIMARY KEY AUTO_INCREMENT,
    NomHabitat varchar(50) not NULL,
    Description_Hab text NOT NULL
);

CREATE TABLE ANIMAL (
    idAnimal int PRIMARY KEY AUTO_INCREMENT,
    NomAnimal varchar(50) not  NULL,
    Type_alimentaire ENUM ('Carnivore', 'Herbivore', 'Omnivore'),
    image varchar(100) NOT NULL,
    id_habitat int,
    FOREIGN KEY (id_habitat) REFERENCES HABITAT(idHab)
);

INSERT INTO animal( NomAnimal,Type_alimentaire,image ,id_habitat)
VALUES('lion','Herbivore','lion.jpg',1 ),
('COPRA','Omnivore','COPRA.jpg',2),
('rabbit','Carnivore','rabbit.jpg',1);


INSERT INTO habitat(NomHabitat,Description_Hab)
VALUES('savane','Habitat africain'),
('Jungle', 'Forêt tropicale dense et humide'),
('Désert', 'Habitat aride très chaud');



UPDATE animal
SET NomAnimal = 'tiger',
     Type_alimentaire ='Herbivore',
     image='tiger.jpg',
     id_habitat=2
     WHERE idAnimal = 2;
     
UPDATE habitat
SET NomHabitat='ocean',
Description_Hab='live in sea'
WHERE idHab=2;
     
DELETE FROM animal
WHERE idAnimal=2;

DELETE FROM habitat
WHERE idHab=3;

SELECT 
animal.idAnimal,
animal.NomAnimal,
animal.Type_alimentaire,
animal.image,
animal.id_habitat
FROM animal
JOIN habitat ON animal.id_habitat=habitat.idHab;

 