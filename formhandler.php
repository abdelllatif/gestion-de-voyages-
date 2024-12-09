
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'vygs';

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $destination = $_POST['destination'];
    $prix = $_POST['prix'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $places_disponible = $_POST['places_disponible'];

    $stmt = $mysqli->prepare('INSERT INTO activite (titre, 	description, destination, prix, date_debut, date_fin, places_disponible) VALUES (?, ?, ?, ?, ?, ?, ?)');
    
    $stmt->bind_param('sssdssi', $titre, $description, $destination, $prix, $date_debut, $date_fin, $places_disponible);

    if ($stmt->execute()) {
        echo 'Activité ajoutée avec succès!';
    } else {
        echo 'Erreur: ' . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();
?>

