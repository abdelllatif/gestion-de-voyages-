# Agence de Voyage - Site Web de Réservation

Ce projet vise à moderniser l'activité d'une agence de voyage en développant un site web de réservation de voyages. Actuellement, les réservations et la gestion des voyages sont réalisées manuellement, ce qui entraîne des erreurs, des doublons et une inefficacité dans le suivi des clients.

L'objectif est de fournir une solution numérique permettant de :
- Gérer les clients inscrits à l’agence.
- Afficher dynamiquement les offres d'activités disponibles (vols, hôtels, circuits touristiques, etc.).
- Permettre aux clients de réserver des activités en ligne et de personnaliser leurs choix (ex. choix de voyage, d’excursions, etc.).

## Fonctionnalités

Le site web inclut plusieurs fonctionnalités essentielles :
1. **Gestion des clients** : Ajouter, modifier et supprimer les informations des clients.
2. **Affichage dynamique des activités** : Lister les activités disponibles (vols, hôtels, circuits, etc.).
3. **Réservation en ligne** : Permettre aux clients de réserver des activités et personnaliser leurs choix.
4. **Suivi des réservations** : Afficher et gérer les réservations existantes.

## Technologies Utilisées

- **HTML** : Utilisé pour la structure de base des pages web et pour l'affichage des informations.
- **Tailwind CSS** : Utilisé pour la mise en page et la conception responsive, permettant un design moderne et adaptable à différentes tailles d'écrans.
- **PHP** : Utilisé pour la gestion du backend, notamment pour interagir avec la base de données et effectuer des opérations de création, lecture, mise à jour et suppression (CRUD) sur les données (clients, activités, réservations).
- **XAMPP** : Utilisé pour la configuration du serveur local, permettant d'exécuter Apache et MySQL sur un environnement de développement local pour tester et déployer l'application.

## la Base de Données (ERD)

la base de données comprend les entités principales suivantes :
- **Clients** : Stocke les informations sur les clients (nom, prénom, email, téléphone, adresse, etc.).
- **Activités** : Contient les détails des activités (titre, description, destination, prix, etc.).
- **Réservations** : Gère les réservations des clients pour les activités (id_client, id_activite, status, etc.).

### Relations
- **Clients et Réservations** : Un client peut effectuer plusieurs réservations.
- **Activités et Réservations** : Une activité peut être réservée par plusieurs clients.
- **Réservations et Clients** : Une réservation est liée à un client et à une activité.
- ## Scripts SQL
Les scripts SQL suivants sont inclus pour gérer la base de données : 
1. **Création de la base de données et des tables** :
2. **Insertion des données de test** :
3. **Modification des données de test** :
2. **Suprimer des données de test** :


## Fonctionnalités PHP

Les fonctionnalités suivantes sont incluses dans le site :

- **Ajouter des données** via des formulaires (membres, activités, réservations).
- **Afficher dynamiquement les données** : Liste des membres, réservations, et activités disponibles.
- **Formulaire de réservation** : Permet aux clients de réserver des activités et de personnaliser leurs choix.
