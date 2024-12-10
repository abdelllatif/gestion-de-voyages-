CREATE DATABASE IF NOT EXISTS mer;
USE mer;

CREATE TABLE IF NOT EXISTS cliente (
    id_client INT(11) NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    telephone VARCHAR(15) NOT NULL,
    adresse TEXT NOT NULL,
    date_naissance DATE NOT NULL,
    PRIMARY KEY (id_client)
);

CREATE TABLE IF NOT EXISTS activite (
    id_activite INT(11) NOT NULL AUTO_INCREMENT,
    titre VARCHAR(150) NOT NULL,
    description VARCHAR(100),
    destination VARCHAR(200) NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    places_disponible INT(11),
    PRIMARY KEY (id_activite)
);

CREATE TABLE IF NOT EXISTS reservation (
    id_reservation INT(11) NOT NULL AUTO_INCREMENT,
    id_client INT(11) NOT NULL,
    id_activite INT(11) NOT NULL,
    date_reservation TIMESTAMP NOT NULL,
    status ENUM('En attente', 'Confirmée', 'Annulée') NOT NULL,
    PRIMARY KEY (id_reservation),
    FOREIGN KEY (id_client) REFERENCES cliente(id_client),
    FOREIGN KEY (id_activite) REFERENCES activite(id_activite)
);


INSERT INTO cliente (nom, prenom, email, telephone, adresse, date_naissance)
VALUES 
('John', 'Doe', 'john.doe@example.com', '123456789', '123 Main Street', '1990-01-01'),
('babu', 'ale', 'john.e@example.com', '123786789', '456 Park Avenue', '1995-05-05'),
('pop', 'Dorede', 'john.de@example.com', '4556655567', '789 Elm Street', '1988-12-12'),
('Jofereshn', 'broe', 'john.doue@example.com', '123478789', '321 Oak Lane', '1992-03-03'),
('saden', 'jakoe', 'john.dome@example.com', '963456789', '654 Pine Road', '1998-08-08');


INSERT INTO activite (titre, description, destination, prix, date_debut, date_fin, places_disponible)
VALUES
('Aventure Désert', 'Nuit dans les dunes', 'Merzouga', 250.00, '2024-03-20', '2024-03-21', 10),
('Festival Musique', 'Concert plein air', 'Ouarzazate', 100.00, '2024-04-15', '2024-04-15', 50),
('Roma Désert', 'Nuit dans les dunes', 'Sala', 200.00, '2024-03-20', '2024-03-21', 15),
('Aventure USA', 'Voyage de luxe', 'Rabat', 500.00, '2024-06-01', '2024-06-10', 8);

INSERT INTO reservation (id_client, id_activite, date_reservation, status)
VALUES
(1, 1, '2023-12-01 10:00:00', 'Confirmée'),
(2, 2, '2023-12-02 15:30:00', 'En attente'),
(2, 1, '2023-12-03 10:00:00', 'Annulée'),
(3, 3, '2023-12-04 09:00:00', 'Confirmée');

DELETE FROM reservation WHERE id_client = 4;

DELETE FROM cliente WHERE id_client = 4;

DELETE FROM reservation WHERE id_activite = 4;

DELETE FROM activite WHERE id_activite = 4;

DELETE FROM reservation WHERE id_reservation = 4;
UPDATE cliente
SET 
    nom = 'Ali',
    prenom = 'Hassan',
    email = 'ali.hassan@example.com',
    telephone = '987654321',
    adresse = '789 New Street',
    date_naissance = '1991-07-15'
WHERE id_client = 1;


UPDATE activite
SET 
    titre = 'Aventure Montagne', 
    description = 'Randonnée dans les montagnes',
    destination = 'Atlas',
    prix = 300.00, 
    date_debut = '2024-05-01',
    date_fin = '2024-05-03', 
    places_disponible = 20
WHERE id_activite = 2;
