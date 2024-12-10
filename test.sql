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


