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
    $id_client = $_POST['id_client'];
    $id_activite = $_POST['id_activite'];
    $date_reservation = $_POST['date_reservation'];
    $status = $_POST['status'];

    $stmt = $mysqli->prepare('INSERT INTO reservation (id_client, id_activite, date_reservation, status) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('iiss', $id_client, $id_activite, $date_reservation, $status);

    if ($stmt->execute()) {
        echo 'Réservation ajoutée avec succès!';
    } else {
        echo 'Erreur: ' . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();
?>
