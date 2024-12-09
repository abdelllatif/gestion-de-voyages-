CREATE DATABASE IF NOT EXISTS vygs;
USE vygs;

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
VALUES ('John', 'Doe', 'john.doe@example.com', '123456789', '123 Main Street', '1990-01-01');


INSERT INTO activite (titre, description, destination, prix, date_debut, date_fin, places_disponible) VALUES
('Aventure Désert', 'Nuit dans les dunes', 'Merzouga', 250.00, '2024-03-20', '2024-03-21', 10),
('Festival Musique', 'Concert plein air', 'Ouarzazate', 100.00, '2024-04-15', '2024-04-15', 50);


INSERT INTO reservation (id_client, id_activite, date_reservation, status) VALUES
(1, 1, '2023-12-01 10:00:00', 'Confirmée'),
(2, 2, '2023-12-02 15:30:00', 'En attente'),