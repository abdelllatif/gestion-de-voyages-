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
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $date_naissance = $_POST['date_naissance'];


    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare('INSERT INTO cliente (nom,prenom, email, telephone,adresse,date_naissance) VALUES (?, ?, ?, ?, ?, ?)');
    
    $stmt->bind_param('ssssss', $nom,$prenom, $email, $telephone,$adresse,$date_naissance);

    if ($stmt->execute()) {
        echo 'User registered successfully!';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();
?>
