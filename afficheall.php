<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'vygs';

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

$clients_result = $mysqli->query("SELECT id_client, nom FROM cliente");

$reservations_result = $mysqli->query("SELECT r.id_reservation, r.id_client, r.id_activite, r.date_reservation, r.status, 
                                       c.nom as client, 
                                       a.titre as activite
                                       FROM reservation r
                                       JOIN cliente c ON r.id_client = c.id_client
                                       JOIN activite a ON r.id_activite = a.id_activite");


$reservations_count = $mysqli->query("SELECT COUNT(*) as total_reservations FROM reservation");
$total_reservations = $reservations_count->fetch_assoc()['total_reservations'];

$activities_result = $mysqli->query("SELECT a.id_activite, a.titre, a.places_disponible, 
                                    (a.places_disponible - COUNT(r.id_reservation)) AS available_spots
                                    FROM activite a
                                    LEFT JOIN reservation r ON a.id_activite = r.id_activite
                                    GROUP BY a.id_activite, a.titre, a.places_disponible");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Reservations Overview</title>
</head>
<body class="bg-gray-100">

<nav class="bg-indigo-600 p-4">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="h-36 w-36"><img src="includes/—Pngtree—tour and travel logo_5695483.png" alt="travels"></div>
                <div class="ml-10 flex items-center space-x-4">
                    <a href="index.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Ajouter Client</a>
                    <a href="afficheall.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Informations</a>
                    <a href="fold.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Ajouter Activité</a>
                    <a href="reserv.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Ajouter Réservation</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container mx-auto p-6">
   
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Total Reservations: <?= $total_reservations ?></h1>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800"> Activities Disponible</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md mt-4">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-2 px-4 text-left">Activity</th>
                    <th class="py-2 px-4 text-left">Available Spots</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($activity = $activities_result->fetch_assoc()) { ?>
                    <tr>
                        <td class="py-2 px-4"><?= $activity['titre'] ?></td>
                        <td class="py-2 px-4"><?= $activity['available_spots'] ?> / <?= $activity['places_disponible'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800">Clients and Their Reservations</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md mt-4">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-2 px-4 text-left">Client</th>
                    <th class="py-2 px-4 text-left">Reservation ID</th>
                    <th class="py-2 px-4 text-left">Activity</th>
                    <th class="py-2 px-4 text-left">Date</th>
                    <th class="py-2 px-4 text-left">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($reservation = $reservations_result->fetch_assoc()) { ?>
                    <tr>
                        <td class="py-2 px-4"><?= $reservation['client'] ?></td>
                        <td class="py-2 px-4"><?= $reservation['id_reservation'] ?></td>
                        <td class="py-2 px-4"><?= $reservation['activite'] ?></td>
                        <td class="py-2 px-4"><?= $reservation['date_reservation'] ?></td>
                        <td class="py-2 px-4"><?= $reservation['status'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<footer class="bg-indigo-600 text-white text-center py-4 mt-24">
    <p class="text-sm">© 2024 Mon Application - Tous droits réservés</p>
    <div class="mt-2">
        <a href="index.php" class="text-white hover:underline text-sm">Ajouter Client</a> |
        <a href="fold.php" class="text-white hover:underline text-sm">Ajouter Activité</a> |
        <a href="reserv.php" class="text-white hover:underline text-sm">Ajouter Réservation</a>
    </div>
</footer>
</body>
</html>

<?php
$mysqli->close();
?>
